<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredients = $_POST['ingredients'] ?? '';
    $cuisine = $_POST['cuisine'] ?? '';
    $diet = $_POST['diet'] ?? '';

    // Sanitize the inputs
    $ingredients = filter_var($ingredients, FILTER_SANITIZE_STRING);
    $cuisine = filter_var($cuisine, FILTER_SANITIZE_STRING);
    $diet = filter_var($diet, FILTER_SANITIZE_STRING);

    // Now, you can use these variables to perform your search logic
    echo "You searched for ingredients: " . $ingredients . 
         ", Cuisine: " . $cuisine . 
         ", Dietary preference: " . $diet;
    // Instead of echoing, here you'd usually query your database or another data source
}
?>