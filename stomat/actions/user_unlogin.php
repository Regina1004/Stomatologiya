<?php
ob_start();
require_once('../db/db.php'); 

session_start(); 

session_destroy();

ob_clean();
header('Location: ../index.php');