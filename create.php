<?php

require_once('db_credentials.php');
require_once('database.php');
include "header.php" ;
$db = db_connect();

  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
 //$id = $_POST['id'] ;
 $cuisine = $_POST['cuisine'] ;
 $ingredients = $_POST['ingredients'];
 $instructions = $_POST['instructions'];
 $cooktime = $_POST['cooktime'];


  $sql = "INSERT INTO recipes(cuisine, ingredients, instructions, cooktime) VALUES ('$cuisine','$ingredients','$instructions', '$cooktime')";
$result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    
  
  //$id = mysqli_insert_id($db);
  //redirect to show page
   header("Location: showrecipes.php");
  

} else {
    header("Location: newrecipes.php");
}

?>