<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="Adminlogin1.css" />
    <link rel="icon" href="./admaslogo.jpg" type="image/x-icon">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }
        .header {
            color: white;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 25px;
            text-align: center;
            background-color: transparent;
        }
        .header img {
            max-width: 160px;
            max-height: 160px;
            width: 90%;
            border-radius: 50%;
        }
        #page {
            text-align: center;
        }
        .header h1 {
            transform: translate(-70%, 0);
            text-align: center;
        }
    </style>
</head>
<header class="header">
    <div class="imgwrapper">
        <img src="admaslogo.jpg" alt="admaslogo" />
    </div>
    <h1>ADMAS UNIVERSITY <br/> ONLINE EXAMINATION SYSTEM</h1>
</header>
<body>

<div id="myModal" class="modal" <?php if(isset($_SESSION['error']) && $_SESSION['error']){ echo 'style="display: block;"'; } ?>>
    <div class="modal-content">
        <h2>Incorrect Credentials</h2>
        <p>Please check your username and password.</p>
    </div>
</div>

<div class="wrapper">
    <ul class="mainiconwrap">
        <i class="fa-solid fa-user mainicon"></i>
    </ul>
    <form action="admin_login.php" method="post">
        <h2>Admin login</h2>
        <div class="inputwrap firstinputwrap">
            <ul class="usernameicon">
                <i class="fa-solid fa-user"></i>
            </ul>
            <input type="text" name="u_name" placeholder="Username" required />
        </div>
        <div class="inputwrap">
            <ul class="passwordicon">
                <i class="fa-solid fa-unlock"></i>
            </ul>
            <input type="password" name="password" placeholder="Password" required />
        </div>
        <button class="btn" type="submit">Login</button>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>

<?php
$_SESSION['error'] = false;
?>
