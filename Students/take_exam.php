<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/Login3.css" />
    <link rel="icon" href="./admaslogo.jpg" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <header class="header">
        <div class="imgwrapper">
            <img src="admaslogo.jpg" alt="admaslogo" />
        </div>
        <h1>
            ADMAS UNIVERSITY <br />
            ONLINE EXAMINATION SYSTEM
        </h1>
    </header>
    <div class="loginwrapper">
        <div class="first">
            <h1>Welcome Back</h1>
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo "<h3 id='error' style='color: red; text-align: center;'>" . $_SESSION['error'] . "</h3>";
                unset($_SESSION['error']); // Remove the error message after displaying
            }
            ?>
            <h2></h2>
            <form action="login.php" method="post">
                <label for="un">User Name</label>
                <input required name="un" type="text" placeholder="User Name" />
                <label for="id">Id</label>
                <input required name="id" type="text" placeholder="Id" />
                <label for="pw">Password</label>
                <input required name="pw" type="password" placeholder="Password" id="passwordInput" />
                <div class="flex">
                    <label for="showpw">Show Password </label>
                    <input name="showpw" type="checkbox" id="showPassword">
                </div>
                <button type="submit">Login</button>
                <script>
                    document.getElementById("showPassword").addEventListener("change", function() {
                        var passwordInput = document.getElementById("passwordInput");
                        if (this.checked) {
                            passwordInput.type = "text";
                        } else {
                            passwordInput.type = "password";
                        }
                    });
                </script>
            </form>
            <p>Don't have a password? <a href="setpass.html">Set password</a></p>
        </div>
        <div class="second">
            <img src="./images/loginimg.jpg" alt="Login image" />
        </div>
    </div>
</body>
</html>
