<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="description" content="Shows the details of plan selected">
  <title>Destination Information</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
  <body>
    <div class="show_div">
      <a href="/Dashboards">Home</a>
      <a href="/Dashboards/end">Logout</a>

      <h2 id="show_h3_tag"><?php echo $show['destination']; ?></h2>

      <h3>Planned By: <?= $show['name']?></h3>
      <h3>Description: <?= $show['description']?></h3>
      <h3>Travel Date From: <?= $show['start_date']?></h3>
      <h3>Travel Date To: <?= $show['end_date']?></h3>

      <h2 id="show_h3_tag">Other Users' joining the trip:</h2>

      <h3>
        <?php foreach ($joining as $values) :
              echo $values['name'] . "</br>";
        endforeach;  ?>
     </h3>
    </div>
  </body>
</html>
