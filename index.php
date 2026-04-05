<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once ('vendor/autoload.php');
require_once ('config/database.php');
use Src\Route;
Route::route_site();