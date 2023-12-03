<?php

require_once('db_credentials.php');
require_once('database.php');
include "header.php" ;
$db = db_connect();

  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $id = $_POST['id'] ;
 $dish_name = $_POST['dish_name'] ;
 $cuisine_type = $_POST['cuisine_type'];
 $dietary_preference = $_POST['dietary_preference'];
 $cook_time = $_POST['cook_time'];
 $instructions = $_POST['instructions'];
 $image_path = $_POST['image_path'];


  $sql = "UPDATE INTO recipe WHERE ID = $id (id, dish_name, cuisine_type, dietary_preference, cook_time, instructions, image_path) VALUES ('$id', '$dish_name', '$cuisine_type',$dietary_preference','$cook_time', '$instructions', '$image_path')";
$result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    
  
  //$id = mysqli_insert_id($db);
  //redirect to show page
   header("Location: showrecipes.php");
  

} else {
    header("Location: newrecipes.php");
}

