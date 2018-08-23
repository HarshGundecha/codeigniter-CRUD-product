<?php
class Login extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		$this->load->model('Login_m', 'lm');
		$this->load->library('form_validation', '','fv');
    if($this->ss->User_Email)
			redirect('Product');
	}

	public function index()
	{
		$this->load->view('login');
	}

  function login()
  {
    $this->fv->set_rules('sEmail', 'Email', 'trim|required|valid_email');
    $this->fv->set_rules('sPassword', 'Password', 'trim|required|min_length[8]|max_length[32]');
    if($this->fv->run()==FALSE)
    {
      $this->load->view('login');
    }
    else
    {
      $creds=null;
      $creds=['Email'=>$this->input->post('sEmail')];
      $login=null;
      $login=$this->lm->get_login_data($creds);
      if(count($login)===1 && password_verify($this->input->post('sPassword'), password_hash($this->input->post('sPassword'), PASSWORD_DEFAULT)))
      {
        $this->ss->set_userdata([
          'User_Name'=>$login[0]->Name,
          'User_Slug'=>$login[0]->Slug,
          'User_Email'=>$login[0]->Email
        ]);
        redirect('Product/');
      }
      else
      {
        $data=null;
        $data['error']="";
        $data['error']="Invalid Email or Password";
        $this->load->view('login',$data);
      }
    }
  }
}
