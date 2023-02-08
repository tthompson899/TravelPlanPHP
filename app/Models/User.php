<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{

    public function register()
    {
        $this->load->library('form_validation');

        $this->User->create($this->input->post());
        $user_data = $this->get_user($this->input->post());
        // var_dump($user_data); die();
        $this->session->set_userdata('user_data', $user_data);

        //Change the registration process to include the name of the user
        redirect("/Dashboards", $this->session->userdata('user_data', $user_data));
        // $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('remail', 'Email', 'required|trim');
        // $this->form_validation->set_rules('rpassword', 'Password', 'required|min_length[4]|trim');
        // $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[rpassword]|trim');

        // if ($this->form_validation->run() == false)
        // {
        //     $errors = validation_errors();
        //     $this->session->set_flashdata('register_errors', $errors);
        // } else {
        //     $this->User->create($this->input->post());
        //     $user_data = $this->get_user($this->input->post());
        //     // var_dump($user_data); die();
        //     $this->session->set_userdata('user_data', $user_data);

        //     //Change the registration process to include the name of the user
        //     redirect("/Dashboards", $this->session->userdata('user_data', $user_data));
        // }
    }

    public function login()
    {
        $user_data = $this->get_login_user($this->input->post());

        $verify = password_verify($this->input->post('password'), $user_data['password']);

        if ($verify)
        {
            $this->session->set_userdata('user_data', $user_data);
            redirect("/Dashboards", $this->session->userdata('user_data', $user_data));
        }
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

        // if ($this->form_validation->run() == false)
        // {
        //     $lerrors = validation_errors();
        //     $this->session->set_flashdata('login_errors', $lerrors);
        // } else {
        //     $user_data = $this->get_login_user($this->input->post());

        //     $verify = password_verify($this->input->post('password'), $user_data['password']);

        //     if ($verify)
        //     {
        //         $this->session->set_userdata('user_data', $user_data);
        //         redirect("/Dashboards", $this->session->userdata('user_data', $user_data));
        //     } else {
        //         echo "Wrong email or password! Try again!";
        //     }
        // }
    }

    public function create($post)
    {
        // $query = "INSERT INTO users (name, email, password, created_at) VALUES (?,?,?, NOW())";
        $values = array($post['name'], $post['remail'], password_hash($post['rpassword'], PASSWORD_DEFAULT), NOW());
        $this->insert($values);

        // $this->db->create($query, $values);
    }

    public function get_user($email)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        // var_dump($email); die();
        $value = array($email['remail']);
        return $this->db->query($query, $value)->getRowArray();
    }

    public function get_login_user($lemail)
    {
        $query = "SELECT * FROM users where email = ?";
        $value = array($lemail['email']);
        return $this->db->query($query, $value)->getRowArray();
    }
}
