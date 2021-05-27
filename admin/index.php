<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="SHORTCUT ICON" href="https://i.pinimg.com/236x/9f/a1/f0/9fa1f0f54a413ed453a0a3c6536b73a3.jpg" type="image/x-icon">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Admin Shop</title>
    </head>

    <body>
        <header>
            <b>Sign In as Admin</b>
            <div class="button">
                <button onclick="document.location.href = '../index.php';">Return</button>
            </div>
        </header>

        <main>
            <form method="post" class="dataInput">
                <label for="loggin">Loggin:</label>
                <input type="text" name="loggin" id="loggin" class="tex"><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="pas"><br>
                <button type="submit" name="check">Sign In</button><br>
            
                <?php 
                    if (isset($_POST["check"])) {
                        if ($_POST["loggin"] == "Admin" && $_POST["password"] == "Admin") {
                            session_start();

                            $_SESSION['admin'] = "Admin";

                            header('Location: productList.php');
                        } else {
                            echo "<span><font color='red'>Wrong data</font></span><br>";
                        }
                    }
                ?>
            
            </form>
        </main>

        <footer>
            Aleksejs Ivanovs
        </footer>
    </body>
</html>