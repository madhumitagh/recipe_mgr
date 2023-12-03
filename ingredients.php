<?php
include 'db_connect.php'; // Your database connection file

// Query to get all ingredients
$sql = "SELECT id, name FROM Ingredients ORDER BY name";
$result = $conn->query($sql);
?>

<select name="ingredient">
    <option value="">Select Ingredient</option>
    <?php while($row = $result->fetch_assoc()): ?>
        <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
    <?php endwhile; ?>
</select>