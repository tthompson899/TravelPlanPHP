<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_User extends CI_Model {

  public function add($user_id, $post_data)
  {

    $query = "INSERT INTO plans (destination, description, start_date, end_date, created_at, updated_at, created_by_id)
              VALUES (?,?,?,?, NOW(), NOW(),?)";

    $values = array($post_data['dest'], $post_data['descr'], $post_data['start'], $post_data['end'], $user_id);
    $this->db->query($query, $values);
  }

  public function all()
  {
    $query = "SELECT * FROM plans LEFT JOIN users_plans ON users_plans.plans_id = plans.id
              WHERE plans.created_by_id = ? OR users_plans.users_id = ?";
    $values = array($this->session->userdata['user_data']['id'], $this->session->userdata['user_data']['id']);
    return $this->db->query($query, $values)->result_array();
  }
  // function that grabs all the data NOT from the user wher the user_id != current user_id
  public function other_users()
  {
    //SELECT all the plans in the database, where the plan.id is not in the selected area of others users plans
    $query = "SELECT users.name, plans.*
              FROM plans JOIN users ON plans.created_by_id = users.id
              WHERE plans.id
              NOT IN
              (SELECT plans.id FROM plans JOIN users_plans
              ON users_plans.plans_id = plans.id
              WHERE plans.created_by_id = ? OR users_plans.users_id = ?)";
    $values = array($this->session->userdata['user_data']['id'], $this->session->userdata['user_data']['id']);
    return $this->db->query($query, $values)->result_array();
  }

  public function join($plans_id)
  {
    $query = "INSERT INTO users_plans (plans_id, users_id) VALUES (?, ?)";
    $values = array($plans_id, $this->session->userdata['user_data']['id']);
    $this->db->query($query, $values);

  }

  public function show($plan_id)
  {
    $query = "SELECT plans.destination, plans.description, plans.start_date, plans.end_date, users.name
              FROM plans JOIN users ON users.id = plans.created_by_id WHERE plans.id = ?";
    $values = array($plan_id);

    return $this->db->query($query, $values)->row_array();
  }

  public function joiners($plans_id)
  {
    $query = "SELECT plans.*, users.*, users_plans.users_id
              FROM users_plans JOIN plans ON plans.id = users_plans.plans_id
              JOIN users_plans joiner ON joiner.plans_id = plans.id
              JOIN users ON users.id = joiner.users_id
              WHERE joiner.plans_id = ?;";
    $values = array($plans_id);
    return $this->db->query($query, $values)->result_array();
  }
}
