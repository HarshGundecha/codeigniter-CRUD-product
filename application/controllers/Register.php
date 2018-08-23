<?php
class Register extends CI_Controller {
	public function __construct()
	{
		Parent::__construct();
		$this->load->model('Register_m', 'rm');
		$this->load->library('form_validation', '','fv');
    if($this->ss->User_Email)
			redirect('Product');
	}
	public function index()
	{
		//$data['cat_data'] = $this->pm->get_category_data();
		$this->load->view('register');
	}
  function register()
  {
    $this->fv->set_rules('iName', 'Name', 'trim|required|max_length[50]|is_unique[user.Name]');
    $this->fv->set_rules('iEmail', 'Email', 'trim|required|valid_email[50]|is_unique[user.Email]');
    $this->fv->set_rules('iPassword1', 'Password', 'trim|required|min_length[8]|max_length[32]');
    $this->fv->set_rules('iPassword2', 'Confirmation Password', 'trim|required|matches[iPassword1]');
    $this->fv->set_rules('iAddress', 'Address', 'trim|required|min_length[5]|max_length[450]',['min_length'=>'The Address field must be at least 5 characters in length.','max_length'=>'The Address field cannot exceed 450 characters in length.']);
    if($this->fv->run()==FALSE)
    {
      $this->load->view('register');
    }
    else
    {
      $user_data=null;
      $user_data = [
        'Name'=>$this->input->post('iName'),
        'Slug'=>url_title($this->input->post('iName'),'-',true),
        'Email'=>$this->input->post('iEmail'),
        'Password'=>password_hash($this->input->post('iPassword'), PASSWORD_DEFAULT),
        'Address'=>$this->input->post('iAddress')
      ];
      $this->rm->add_user_data($user_data);
      $this->ss->set_userdata([
        'User_Name'=>$user_data['Name'],
        'User_Slug'=>$user_data['Slug'],
        'User_Email'=>$user_data['Email']
      ]);
      redirect('Product/');
    }
  }

  // function send_otp()
  // {
  //   $this->fv->set_rules('iPhone', 'Phone', 'trim|required|numeric|exact_length[10]');
  //   if($this->fv->run()==FALSE)
  //   {
  //     echo json_encode(['status'=>false]);
  //     echo validation_errors();
  //   }
  //   else
  //   {
  //     $this->load->helper('send_sms_helper');
  //     var_dump(send_sms($this->input->post('iPhone'),'hello people'));
  //     echo json_encode(['status'=>true]);
  //   }
  // }
}
