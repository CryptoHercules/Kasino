<?php

include('config.php');
session_start();

if (isset($_POST['login']))
{

    $username = $_POST['username'];
    $password = $_POST['lösenord'];

    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result)
    {
        echo '<p class="error">Username password combination is wrong!</p>';
    }
    else
    {
      if (password_verify($password, $result['lösenord']))
      {
        $_SESSION['user_id'] = $result['username'];
        header('Location: Blaahhtml.php');
      }
      else
      {
        echo '<p class="error">HEJ!</p>';
      }
    }
}

?>

<form method="post" action="login.php" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
