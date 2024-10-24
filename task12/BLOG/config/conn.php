<?php
include './config/env.php';

$conn = new PDO(dsn: "mysql:host=".DB_HOST.";dbname=".DB_NAME, username:DB_USER, password:DB_PASSWORD);

