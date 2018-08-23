<?php
class Product extends CI_Controller {
	public function __construct()
	{
		Parent::__construct();
		$this->load->model('Product_m', 'pm');
		$this->load->library('form_validation', '','fv');
		if(!$this->ss->User_Email)
			redirect('Login');
	}
	public function index()
	{
		$data['cat_data'] = $this->pm->get_category_data();
		$this->load->view('product',$data);
	}

	public function get_product($slug=false)
	{
		$where=false;
		if($slug)
		{
			$where=null;
			$where = ['ProductSlug'=>$slug];
			$data['product'] = $this->pm->get_product_data($where);
			if(count($data['product'])==1)
				$this->load->view('product_detail', $data);
			else
				$this->load->view('error', $data);
		}
		else
		{
			$data = null;
			$data = $this->pm->get_product_data($where);
			echo json_encode([
	      "sEcho" => 1,
	      "iTotalRecords" => count($data),
	      "iTotalDisplayRecords" => count($data),
	      "aaData"=>$data
	    ]);
		}
	}

	public function get_product_update($slug=false)
	{
		if($slug)
		{
			$where=null;
			$where = ['ProductSlug'=>$slug];
			$product = $this->pm->get_product_data($where);
			$category = $this->pm->get_category_data();
			?>
			<div class="box box-primary" style="box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">

				<div class="box-header with-border">
					<h3 class="box-title">Product Details</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<input type="hidden" name="ProductSlug" value="<?=$product[0]->ProductSlug;?>">
						<div class="col-md-5">
							<div class="form-group">
								<label for="uName">Name</label>
								<input autofocus type="text" class="form-control" name="uName" id="uName" placeholder="Name" value="<?=$product[0]->PName?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="uPrice">Price</label>
								<input type="text" class="form-control" name="uPrice" id="uPrice" placeholder="Price" value="<?=$product[0]->Price?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="uCategory">Category</label>
								<select class="form-control" name="uCategory">
									<?php
										foreach ($category as $cd)
										{
											?>
												<option value="<?=$cd->CategorySlug?>" <?=$cd->CategorySlug==$product[0]->CategorySlug?'selected':''?> ><?=$cd->Name?></option>
											<?php
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="uDescription">Description</label>
								<textarea class="form-control" name="uDescription" id="uDescription" placeholder="Description"><?=$product[0]->Description?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="alert alert-danger alert-dismissible" id="update-failed-alert" style="display:none;box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
				<button type="button" class="close" aria-hidden="true" onclick="$(this).parent().hide()">×</button>
				<h4><i class="icon fa fa-ban"></i> Invalid Input :(</h4>
				<div>
					text here
				</div>
			</div>
			<?php
		}
	}

	public function set_product_update($slug=false)
	{
		$this->fv->set_rules('uName', 'Product Name', 'trim|required|htmlspecialchars|max_length[200]');
		$this->fv->set_rules('uPrice', 'Product Price', 'trim|required|numeric|max_length[11]');
		$this->fv->set_rules('uDescription', 'Product Description', 'trim|required|htmlspecialchars|max_length[500]');
		$this->fv->set_rules('uCategory', 'Product Category', 'trim|required|htmlspecialchars|max_length[500]');
		if($this->fv->run()==FALSE)
			$response=['status'=>false, 'response'=>validation_errors()];
		else
		{
			$data=$where=null;
			$data = [
				'Name'=>$this->input->post('uName'),
				'Price'=>$this->input->post('uPrice'),
				'Description'=>$this->input->post('uDescription'),
				'CategorySlug'=>$this->input->post('uCategory'),
			];
			$where = ['ProductSlug'=>$this->input->post('ProductSlug')];
			$this->pm->update_product_data($data, $where);
			$response=['status'=>true, 'response'=>'Product Updated successfully :)'];
		}
		echo json_encode($response);
	}

	public function add_product()
	{
		$this->fv->set_rules('aName', 'Product Name', 'trim|required|htmlspecialchars|max_length[200]|is_unique[product.Name]');
		$this->fv->set_rules('aPrice', 'Product Price', 'trim|required|numeric|max_length[11]');
		$this->fv->set_rules('aDescription', 'Product Description', 'trim|required|htmlspecialchars|max_length[500]');
		$this->fv->set_rules('aCategory', 'Product Category', 'trim|required|htmlspecialchars|max_length[500]');
		if($this->fv->run()==FALSE)
			$response=['status'=>false, 'response'=>validation_errors()];
		else
		{
			$data=null;
			$data = [
				'Name'=>$this->input->post('aName'),
				'ProductSlug'=>url_title($this->input->post('aName'),'-',true),
				'Price'=>$this->input->post('aPrice'),
				'Description'=>$this->input->post('aDescription'),
				'CategorySlug'=>$this->input->post('aCategory'),
			];
			$this->pm->add_product_data($data);
			$response=['status'=>true, 'response'=>'Product Added successfully :)'];
		}
		echo json_encode($response);
	}

	public function delete_product($slug=false)
	{
		if($slug)
		{
			$where=null;
			$where=['ProductSlug'=>$slug];
			$this->pm->delete_product_data($where);
		}
		elseif(count($this->input->post('dProduct'))>0)
			$this->pm->delete_multiple_product_data($this->input->post('dProduct'));
	}

}
