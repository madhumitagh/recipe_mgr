<?php
 require_once('db_credentials.php'); // Your database connection file

$ingredient = isset($_GET['ingredient']) ? $_GET['ingredient'] : '';
$cuisine = isset($_GET['cuisine']) ? $_GET['cuisine'] : '';
$dietary = isset($_GET['dietary']) ? $_GET['dietary'] : '';

$query = "SELECT * FROM Recipes WHERE 1"; // A query that selects all recipes

// Append to the query if the ingredient is specified
if (!empty($ingredient)) {
    $query .= " AND id IN (
        SELECT recipe_id FROM Recipe_Ingredients WHERE ingredient_id IN (
            SELECT id FROM Ingredients WHERE name LIKE ?)
        )";
}

// Append to the query if the cuisine is specified
if (!empty($cuisine)) {
    $query .= " AND cuisine_id = ?";
}

// Append to the query if the dietary preference is specified
if (!empty($dietary)) {
    $query .= " AND dietary_id = ?";
}

// Prepare statement to avoid SQL injection
//$stmt = $conn->prepare($query);

// Binding parameters
$types = '';
$params = [];
if (!empty($ingredient)) {
    $types .= 's';
    $params[] = "%$ingredient%";
}
if (!empty($cuisine)) {
    $types .= 'i';
    $params[] = $cuisine;
}
if (!empty($dietary)) {
    $types .= 'i';
    $params[] = $dietary;
}

// Dynamically bind parameters
if ($types) {
    $stmt->bind_param($types, ...$params);
}

//$stmt->execute();
//$result = $stmt->get_result();

// ... process and output results

//$stmt->close();
//$conn->close();



// ... (After fetching the results)

//while ($row = $result->fetch_assoc()) {
    // Display your recipe data here
    echo "<div class='recipe'>";
//    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    // Add more details as needed
    echo "</div>";
//}

?>


