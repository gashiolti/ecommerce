<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body> -->

    <?php
        include 'includes/templates/nav.php';
    ?>

    <div class="wrapper-center">
    
        <div class="center">
            <!-- <h1>Log In</h1> -->
            <form action="includes/login.inc.php" method="POST" autocomplete="on">
                <div class="txt-field">
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>

                <div class="txt-field">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>

                <div class="pass">Forgot password?</div>
                <div class="error-message">
                        <?php
                            if(isset($_GET["error"])) 
                            {
                                if($_GET["error"] == "emptyinputs") {
                                    echo "<p style='color: red; font-size: 14px'>Please fill all the fields!</p>";
                                }
                                else if($_GET["error"] == "wronglogin") {
                                    echo "<p style='color: red; font-size: 14px'>Incorrect login informations!</p>";
                                }
                            }
                        ?>
                </div>

                <input type="submit" name="submit" value='SIGN IN &#xf2f6;'>

                <div class="sign-up">
                    Not a member?<a href="signup.php">Sign up</a>
                </div>
            </form>
        </div>

    </div>
    
    <?php
        include 'includes/templates/footer.php';
    ?>

</body>
</html>