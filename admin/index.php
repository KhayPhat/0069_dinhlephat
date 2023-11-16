<?php
session_start();
if(!isset($_SESSION['useradmin']))
{
    header("location: login.php");
}
require_once "../vendor/autoload.php";
require_once "../config/database.php";
Route::route_admin();