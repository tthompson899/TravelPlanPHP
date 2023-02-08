<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateTime;

class Dashboards extends BaseController
{

    public $session;
    public $allUser;

    public function __construct()
    {
        // parent::__construct();
        $this->session = session();
        $this->allUser = new("All_User");
    }

    public function index()
    {
        $all_data = $this->allUser->all();
        $other_users = $this->allUser->other_users();

      // var_dump($all_data); die();
        return view('/Dashboard', array('all_data' => $all_data, 'other_users' => $other_users));
    }

    public function addView($user_id)
    {
        return view("/add");
    }

    public function add($user_id)
    {
        $request = \Config\Services::request();
        helper(['form', 'url']);

        // this probably is not correct
        $this->validate(['dest', 'Destination', 'required']);
        $this->validate(['descr', 'Description', 'required']);
        $this->validate(['start', 'Start Date', 'required']);
        $this->validate(['end', 'End Date', 'required']);

        $date_start = new DateTime($request->getPost('start'));
        $date_end = new DateTime($request->getPost('end'));

        // figure out how to run validation
        if ($validation->run() == false)
        {
            $add_errors = validation_errors();
            $this->session->markAsFlashdata('add_errors', $add_errors);
        }

        if ($date_start < new DateTime(date("Y-m-d")) || $date_end < new DateTime(date("Y-m-d")))
        {
            $date_errors = "Start Date and End Date should be a future date!";
            $this->session->markAsFlashdata('date_errors', $date_errors);
            return view('Add', [$date_errors]);
        } elseif ($date_end < $date_start)
        {
            $end_errors = "End date cannot be before start date!";
            $this->session->markAsFlashdata('end_errors', $end_errors);
            return view('Add', [$end_errors]);
        } else {
            $just_added = $this->allUser->add($user_id, $request->getPost());
            // get the id of the plan that was just added in order to show the plan directly afterwards
            $all_data = $this->allUser->all();
            redirect("/Dashboards", $all_data);
        }
    }

    public function join($plans_id)
    {
        $this->allUser->join($plans_id);
        redirect("/Dashboards ");
    }

    public function show($plan_id)
    {
        $show = $this->allUser->show($plan_id);
        $joining = $this->allUser->joiners($plan_id);
        return view('/Destination', array('show' => $show, 'joining' => $joining));
    }

    public function end()
    {
        $this->session->sess_destroy();
        redirect("/");
    }
}
