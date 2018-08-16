<?php
class Product extends CI_Controller {
	public function __construct()
	{
		Parent::__construct();
		$this->load->model('Product_m', 'pm');
		$this->load->library('form_validation', '','fv');
	}
	public function index()
	{

		//echo '<pre>';
		//print_r($data);;
		$data['cat_data'] = $this->pm->get_category_d();
		$this->load->view('product',$data);
	}

	public function get_product($slug=false)
	{
		$where=false;
		if($slug)
		{
			$where=['ProductSlug'=>$slug];
		}
		$data = null;
		$data = $this->pm->get_product_data($where);
		echo json_encode([
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData"=>$data
    ]);
	}

	public function add_product()
	{
		$this->fv->set_rules('aName', 'Product Name', 'trim|required');
		$this->fv->set_rules('aPrice', 'Product Price', 'trim|number');
		$this->fv->set_rules('aDescription', 'Product Description', 'trim|required');
		$this->fv->set_rules('aCategory', 'Product Category', 'trim|required');
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
			$this->pm->add_product_d($data);
			$response=['status'=>true, 'response'=>'Product Added successfully :)'];
		}
		echo json_encode($response);
	}

}
