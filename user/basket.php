<!DOCTYPE html>

<?php 
    session_start();
    if (isset($_SESSION['data'])) {
		$id = $_SESSION['data'][0];
        $name = $_SESSION['data'][1];
	} else {
		header('Location: ../user/signIn.php');
	}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="SHORTCUT ICON" href="https://i.pinimg.com/236x/9f/a1/f0/9fa1f0f54a413ed453a0a3c6536b73a3.jpg" type="image/x-icon">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Shop</title>
    </head>

    <body>
        <header>
            <b>Basket</b>
            <div class="button">
                <button form="products" name="order" type="submit">To Order</button>
                <button form="products" name="selectedProduct" type="submit">Delete Products from basket</button>
                <button onclick="document.location.href = 'productList.php';">Go Back</button>
                <button onclick="document.location.href = 'changeData.php';">Change Data</button>
                <button onclick="document.location.href = 'logOut.php';">Log Out</button>
            </div>
        </header>
        
        <main>
            <form method="post" id="products" class="bodyShow">

                <?php 
                    require_once "../classes/ProductManagement.php";

                    $show = new \classes\ProductManagement();

                    $show->showAllProductsInBasket($id);

                    if (isset($_POST["selectedProduct"])) {
                        $selectedProduct = new \classes\ProductManagement();

                        $selectedProduct->deleteProductsFromBasket($_POST['selectedProduct'], $id);
                    }
                ?>

            </form>
        </main>

        <footer>
            Shop
        </footer>
    </body>
</html>