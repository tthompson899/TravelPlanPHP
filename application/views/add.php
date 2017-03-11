<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Add a plan to this user's dashboard">
    <title>Add a Plan</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
  </head>
  <body>
    <div class="add_div">
      <h2 class="add">Add a Plan</h2>
      <a href="/Dashboards">Home</a>
      <a href="/Dashboards/end">Logout</a>
      <form method="post" action="/Dashboards/add/<?php echo $this->session->userdata['user_data']['id']; ?>">
        <?= $this->session->flashdata('add_errors'); ?>
        <?= $this->session->flashdata('date_errors'); ?>
        <?= $this->session->flashdata('end_errors'); ?>
        <input type="text" name="dest" placeholder="Destination">
        <input type="text" name="descr" placeholder="Description">
        <label for="start_date">Travel Start-Date: </label><input type="date" name="start">
        <label for="end_date">Travel End-Date: </label><input type="date" name="end">
        <input type="submit" value="Add Plan">
      </form>
    </div>
  </body>
</html>
