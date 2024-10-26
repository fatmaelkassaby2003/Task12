<?php
include_once(__DIR__ . '/../config/conn.php');
$post_id = $_GET['id'];
$sql = "select * from comments where `post_id` = '$post_id' ";

$stmt = $conn->query($sql);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) 
{
    header("Location:./index.php?page=posts&id=$post_id");
    exit();
} else {
    die("505");
}

echo "hello";
?>