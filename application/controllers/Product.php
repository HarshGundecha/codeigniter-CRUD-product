<?php
class Product extends CI_Controller {
	public function __construct()
	{
		Parent::__construct();
		$this->load->model('Product_m', 'pm');
	}
	public function index()
	{

		//echo '<pre>';
		//print_r($data);;
		$this->load->view('product');
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

}
