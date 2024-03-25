<?php
include '../../src/config/dbConfig.php';
session_start();


session_destroy();
header("Location: ../auth/login_user.php");
exit;
