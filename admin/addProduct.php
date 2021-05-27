<!DOCTYPE html>

<?php 
    session_start();
    if (isset($_SESSION['admin'])) {
		$admin = $_SESSION['admin'];
	} else {
		header('Location: ../user/signIn.php');
	}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="SHORTCUT ICON" href="https://i.pinimg.com/236x/9f/a1/f0/9fa1f0f54a413ed453a0a3c6536b73a3.jpg" type="image/x-icon">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Admin Shop</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
    </head>

    <body>
        <header>
            <b>Add Product</b>
            <div class="button">
                <button form="data" name="save" type="submit">Save</button>
                <button form="data" onclick="document.location.href='productList.php';" type="reset">Cancel</button>
            </div>
        </header>

        <form enctype="multipart/form-data" method="POST" id="data" class="bodyAdd">

            <?php
                if (isset($_POST["save"])) {
                    require_once "../classes/AddProduct.php";
                    
                    $add = new \classes\AddProduct($_POST, $_FILES);

                    $add->addProductToDb();
                }
            ?>

            <span class="error">Please, provide the data of indicated type<br></span>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" multiple accept="image/*" class="image"><br>
            <label for="name">Name</label>
            <input type="text" name="name" id="name"><br>
            <label for="price">Price ($)</label>
            <input type="number" min="0" step="0.01" name="price" id="price"><br>
            <label for="description">Description</label>
            <input type="description" name="description" id="description">
        </form>

        <footer>
            Aleksejs Ivanovs
        </footer>
    </body>
</html>