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
        <style>
		table, th, td {
            margin-top: 50px;
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			text-align: center;
		}
		</style>
    </head>

    <body>
        <header>
            <b>View Users</b>
            <div class="button">
                <button onclick="document.location.href = 'productList.php';">Go Back</button>
                <button onclick="document.location.href = 'addProduct.php';">Add Product</button>
                <button form="products" name="delete" type="submit">Delete Users</button>
                <button onclick="document.location.href = '../user/logOut.php';">Log Out</button>
            </div>
        </header>

        <main>
            <form method="post" id="products" class="users">

                <?php 
                    require_once "../classes/GetUserData.php";

                    $userData = new \classes\GetUserData();

                    $userData->showAllUsers();

                    if (isset($_POST["delete"])) {
                        $delete = new \classes\GetUserData();

                        $delete->deleteUsers($_POST['delete']);
                    }
                ?>

            </form>
        </main>

        <footer>
            Aleksejs Ivanovs
        </footer>
    </body>
</html>