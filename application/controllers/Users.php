<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model("User");
  }
	public function index()
	{
		$this->load->view('Login');
	}

  public function register()
  {
    $this->User->register($this->input->post());
    $this->load->view('Login', 'register_errors');
  }
  public function userDashboard()
  {
    //take user to controller after they've been registered
    $this->load->view('/Dashboard');
  }

  public function login()
  {
    $this->User->login($this->input->post());
    $this->load->view('Login', 'login_errors');

  }
}
