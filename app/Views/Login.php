<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Login or register a user">
    <title>Login Or Register</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
      h2{
        color: #003F87;
        text-align: center;
      }
      input {
        display: block;
        margin-left: 32px;
        margin-top: 6px;
      }
      form{
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      #submit{
        background-color: #003F87;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="site-wrapper">
    <h2>Welcome, Please Login or Register</h2>
      <form method="post" action="/users/register">
        <fieldset>
          <!-- <?php // if (isset($register_errors)) : ?> -->
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
            <!-- <?php // $this->session->getFlashdata('login_errors')?> -->
          <legend>Login</legend>
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Login" id="submit">
      </fieldset>
    </form>
  </div>
  </body>
</html>
