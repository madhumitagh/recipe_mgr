<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" media="all" href="Css/recipe.css" />
</head>
<body>
  
<?php include 'header.php'; ?>

<div id="content">

  <a class="back-link" href="<?php echo 'index.php'; ?>"> Back to List</a>

  <div class="New Recipes">
   

    <form action='create.php' method="POST">
    
      <dl>
        <dt>id</dt>
        <dd><input type="text" name="id" /></dd>
      </dl>
      <dl>
        <dt>cuisine</dt>
        <dd><input type="text" name="cuisine"  /></dd>
          
      </dl>
      <dl>
        <dt>ingredients</dt>
        <dd><input type="text" name="ingredients"  /></dd>
        </dd>
      </dl>

      <dl>
        <dt>instructions</dt>
        <dd><input type="text" name="instructions"  /></dd>
        </dd>
      </dl>

      <dl>
        <dt>cooktime</dt>
        <dd><input type="text" name="cooktime"  /></dd>
        </dd>
      </dl>

  
      

      <div id="operations">
        <input type="submit" value="Create" />
      </div>
    </form>
  </div>
</div>
<br>
<br>
<br>

<?php include 'footer.php'; ?>
