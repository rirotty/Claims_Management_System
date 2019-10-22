<?php

session_start();

if ((!isset($_SESSION['userName'])) && (!isset($_SESSION['userPassword'])))
{
header('Location:loginform.php');
}
