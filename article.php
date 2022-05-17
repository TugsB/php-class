<?php
$posts = include 'helpers/posts.php';
var_dump($_GET);
$id = isset($_GET['id'])?$_GET['id']:FALSE;
if($_GET["id"] > count($posts)-1){
    header('Location: 404.php');
};