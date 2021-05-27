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
            <b>Change Data</b>
            <div class="button">
                <button onclick="document.location.href = 'basket.php';">Basket</button>
                <button onclick="document.location.href = 'productList.php';">Go Back</button>
                <button onclick="document.location.href = 'logOut.php';">Log Out</button>
            </div>
        </header>

        <main>
            <form method="post" class="dataInput">

                <?php 
                    require_once "../classes/GetUserData.php";
                
                    $data = new \classes\GetUserData();

                    $userData = $data->getUserData($id);

                    if (isset($_POST["check"])) {
                        require_once "../classes/ChangeData.php";
        
                        $change = new \classes\ChangeData($_POST, $id);

                        $change->changeData();
                    }

                    if (isset($_POST["delete"])) {
                        $data->deleteOnlyOneUser($id);
                    }
                ?>

                <label for="loggin">Loggin:</label>
                <input type="text" name="loggin" id="loggin" class="tex" value="<?php echo $userData['loggin'] ?>"><br>
                <label for="currentPassword">Current Password:</label>
                <input type="password" name="currentPassword" id="currentPassword" class="cuPas"><br>
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password" class="pas"><br>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="tex" value="<?php echo $userData['name'] ?>"><br>
                <label for="surname">Surname:</label>
                <input type="text" name="surname" id="surname" class="tex" value="<?php echo $userData['surname'] ?>"><br>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" class="tex" value="<?php echo $userData['email'] ?>"><br>
                <button type="submit" name="check">Change</button><br>
                <button type="submit" name="delete">Delete profile</button><br>
            </form>
        </main>
        
        <footer>
            Shop
        </footer>
    </body>
</html>