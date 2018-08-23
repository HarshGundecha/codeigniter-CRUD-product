<?php
class Logout extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();
		$this->ss->sess_destroy();
		redirect('Login');
	}
	public function index(){}
}
