<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SineVizyon Login</title>
    <style>
        body {
            background-repeat: no-repeat;

            background-size: cover;
            font-family: sans-serif;
            
        }

        /* Container */
        .container {
            width: 50%;
            margin: 0 auto;
        }
        .ticket{
            width: 50%;
            margin: 0 auto;
            display: block;
            margin-top: 10%;
        }

        /* Login */
        #div_login {
            border-radius: 3px;
            width: 470px;
            height: 270px;
            margin: 0 auto;
        }

        #div_login h1 {
            text-align: center;
            margin-top: 0px;
            font-weight: normal;
            padding: 10px;
            color: white;
            font-family: sans-serif;
        }

        #div_login div {
            clear: both;
            margin-top: 10px;
            padding: 5px;
        }

        #div_login .textbox {
            width: 96%;
            padding: 7px;
            position: center;
        }

        #div_login input[type=submit] {
            position: relative; /* Change from center to relative */
            padding: 7px;
            width: 100px;
            background-color: #ea26158a;
            border: 0px;
            color: white;
            display: block; /* Add this */
            margin: auto; /* Add this */
        }
    </style>
</head>

<body background="./bg.jpg">
    <div class="container">
        <img class="ticket" src="./sinem.png" alt="">
        <br>
        <form method="post" action="">
            <div id="div_login">
                <h1>Login</h1>
                <div>
                    <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password" />
                </div>
                <div>
                    <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include "config.php";

if (isset($_POST['but_submit'])) {

    $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
    $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);

    if ($uname != "" && $password != "") {

        $sql_query = "select count(*) as cntUser from users where username='" . $uname . "' and password='" . $password . "'";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if ($count > 0) {
            $_SESSION['uname'] = $uname;
            header('Location: admin.php');
        } else {
            echo "Invalid username and password";
        }
    }
}
?>