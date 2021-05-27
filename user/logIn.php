<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="SHORTCUT ICON" href="https://i.pinimg.com/236x/9f/a1/f0/9fa1f0f54a413ed453a0a3c6536b73a3.jpg" type="image/x-icon">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Shop</title>
    </head>

    <body>
        <header>
            <b>Log In</b>
            <div class="button">
                <button onclick="document.location.href = '../index.php';">Go Back</button>
            </div>
        </header>

        <main>
            <form method="post" class="dataInput">
                <label for="loggin">Loggin:</label>
                <input type="text" name="loggin" id="loggin" class="tex"><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="pas"><br>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="tex"><br>
                <label for="surname">Surname:</label>
                <input type="text" name="surname" id="surname" class="tex"><br>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" class="tex"><br>
                <button type="submit" name="check">Log In</button><br>
            </form>
        </main>

            <?php 
                if (isset($_POST["check"])) {
                    require_once "../classes/UserRegistration.php";
                    require_once "../classes/CheckUser.php";
                    
                    $POST = $_POST;

                    $add = new \classes\UserRegistration($POST);

                    $add->addUserToDb();
                        
                    $checkUser = new \classes\CheckUser($POST);

                    $checkUser->checkUserData();
                }
            ?>

        <footer>
            Shop
        </footer>
    </body>
</html>