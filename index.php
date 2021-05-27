<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="SHORTCUT ICON" href="https://i.pinimg.com/236x/9f/a1/f0/9fa1f0f54a413ed453a0a3c6536b73a3.jpg" type="image/x-icon">
        <link rel="stylesheet" href="css/styles.css">
        <title>Shop</title>
    </head>

    <body>
        <header>
            <b>Product List</b>
            <div class="button">
                <button onclick="document.location.href = 'user/logIn.php';">Log In</button>
                <button onclick="document.location.href = 'user/signIn.php';">Sign In</button>
            </div>
        </header>

        <main>
            <form method="post" id="products" class="bodyShow">

                <?php 
                    require_once "classes/ProductManagement.php";

                    $show = new \classes\ProductManagement();

                    $show->showAllProductsToUnregisteredUsers();
                ?>

            </form>
        </main>

        <footer>
            Shop
        </footer>
    </body>
</html>