<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Display User Dashboard">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">

  </head>
  <body>
    <div class="jumbotron">
    <h2>Welcome
        <?= $this->session->userdata['user_data']['name'];
        ?>
      !</h2>
      <!-- Redirect all logouts to a function that ends the user session data -->
      <a href="/Dashboards/end">Logout</a>
      <h3>Your Trip Schedules</h3>
      <table border="1">
        <th>Destination</th>
        <th>Description</th>
        <th>Travel Start Date</th>
        <th>Travel End Date</th>
        <?php foreach ($all_data as $value): ?>
        <tr>
          <td><a href="/Dashboards/show/<?php echo $value['plans_id'];?>"><?php echo $value['destination']; ?></a></td>
          <td><?php echo $value['description']; ?></td>
          <td><?php echo $value['start_date']; ?></td>
          <td><?php echo $value['end_date']; ?></td>
        </tr>
        <?php endforeach; ?>
      </table>

      <h3>Other User's Trip Schedules</h3>
      <table border="1">
        <th>Name</th>
        <th>Destination</th>
        <th>Travel Start Date</th>
        <th>Travel End Date</th>
        <th>Do You Want to Join?</th>

        <?php foreach ($other_users as $values):?>
        <tr>
          <td><?php echo $values['name'] ?></td>
          <td><a href="/Dashboards/show/<?php echo $values['id']; ?>">
          <?php echo $values['destination'] ?></a></td>
          <td><?php echo $values['start_date'] ?></td>
          <td><?php echo $values['end_date'] ?></td>
          <td><a href="/Dashboards/join/<?php echo $values['id']; ?>">Join</a></td>
        </tr>
        <?php endforeach; ?>
      </table>

      <a href="/Dashboards/addView/<?php echo $this->session->userdata['user_data']['id']; ?>">Add a Plan</a>
    </div>
  </body>
</html>
