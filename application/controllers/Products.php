<?php
class Products extends CI_Controller {
	public function index()
	{
		$this->load->database();
		$data=$this->db
			->get('product')
			->result();
		echo '<pre>'; 
		print_r($data);;
		//$this->load->view('data');
	}
}
