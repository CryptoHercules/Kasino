<?php

include('config.php');
session_start();

if(!isset($_SESSION['id']))
{
    header('Location: login.php');
    exit;
}
else
{
	echo '<p class="success"> Congratulations, you are logged in!</p>';
}

?>
