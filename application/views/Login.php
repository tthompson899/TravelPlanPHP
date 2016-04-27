<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Login or register a user">
    <title>Login Or Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/stylesheets/style.css">
  </head>
  <body>
    <div class="site-wrapper">
    <h2>Welcome, Please Login or Register</h2>
      <form method="post" action="/Users/register">
        <fieldset>
            <?= $this->session->flashdata('register_errors') ?>
          <legend>Register</legend>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="remail" placeholder="Email">
            <input type="password" name="rpassword" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <input type="submit" name="submit" value="Register" id="submit">
        </form>
        </fieldset>

    <form method="post" action="/Users/login">
        <fieldset>
            <?= $this->session->flashdata('login_errors')?>
          <legend>Login</legend>
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Login" id="submit">
      </fieldset>
    </form>
  </div>
  </body>
</html>
