<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model("All_User");

  }
  public function index()
  {
    $all_data = $this->All_User->all();
    $other_users = $this->All_User->other_users();

    // var_dump($all_data); die();
    $this->load->view('/Dashboard', array('all_data' => $all_data, 'other_users' => $other_users));
  }

  public function addView($user_id)
  {
    $this->load->view("/add");
  }

  public function add($user_id)
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('dest', 'Destination', 'required');
    $this->form_validation->set_rules('descr', 'Description', 'required');
    $this->form_validation->set_rules('start', 'Start Date', 'required');
    $this->form_validation->set_rules('end', 'End Date', 'required');

    $date_start = new DateTime($this->input->post('start'));
    $date_end = new DateTime($this->input->post('end'));

    if($this->form_validation->run() == FALSE)
    {
      $add_errors = validation_errors();
      $this->session->set_flashdata('add_errors', $add_errors);
    }

    if($date_start < new DateTime(date("Y-m-d")) || $date_end < new DateTime(date("Y-m-d")))
    {
      $date_errors = "Start Date and End Date should be a future date!";
      $this->session->set_flashdata('date_errors', $date_errors);
      $this->load->view('Add', 'date_errors');
    }
    elseif($date_end < $date_start)
    {
      $end_errors = "End date cannot be before start date!";
      $this->session->set_flashdata('end_errors', $end_errors);
      $this->load->view('Add', 'end_errors');
    }
    else {
      $just_added = $this->All_User->add($user_id, $this->input->post());
      // get the id of the plan that was just added in order to show the plan directly afterwards
      $all_data = $this->All_User->all();
      redirect("/Dashboards", $all_data);
    }
  }

  public function join($plans_id)
  {
    $this->All_User->join($plans_id);
    redirect("/Dashboards ");
  }

  public function show($plan_id)
  {
    $show = $this->All_User->show($plan_id);
    $joining = $this->All_User->joiners($plan_id);
    $this->load->view('/Destination', array('show' => $show, 'joining' => $joining));
  }

  public function end()
  {
    $this->session->sess_destroy();
    redirect("/");
  }


}
