<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="description" content="Shows the details of plan selected">
  <title>Destination Information</title>
  <body>
    <div class="show_div">
      <a href="/Dashboards">Home</a>
      <a href="/Dashboards/end">Logout</a>

      <h2><?php echo $show['destination']; ?></h2>

      <h3>Planned By: <?= $show['name']?></h3>
      <h3>Description: <?= $show['description']?></h3>
      <h3>Travel Date From: <?= $show['start_date']?></h3>
      <h3>Travel Date To: <?= $show['end_date']?></h3>

      <h2>Other Users' joining the trip:</h2>
      <?php
          foreach($joining as $values):
            echo $values['name']. "</br>";
      endforeach;  ?>
    </div>
  </body>
</html>
