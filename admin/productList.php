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
    </head>

    <body>
        <header>
            <b>Product List</b>
            <div class="button">
                <strong><?php echo $admin ?></strong>
                <button onclick="document.location.href = 'viewUsers.php';">View Users</button>
                <button onclick="document.location.href = 'addProduct.php';">Add Product</button>
                <button form="products" name="selectedProduct" type="submit">Delete Products</button>
                <button onclick="document.location.href = '../user/logOut.php';">Log Out</button>
            </div>
        </header>

        <main>
            <form method="post" id="products" class="bodyShow">

                <?php 
                    require_once "../classes/ProductManagement.php";

                    $show = new \classes\ProductManagement();

                    $show->showAllProduct();

                    if (isset($_POST["selectedProduct"])) {
                        $delete = new \classes\ProductManagement();

                        $delete->deleteProducts($_POST['selectedProduct']);
                    }
                ?>

            </form>
        </main>

        <footer>
            Aleksejs Ivanovs
        </footer>
    </body>
</html>