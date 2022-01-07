<?php


require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);


if (isset($_POST["submitButton"])) {

    $username = FormSanitizer::sanitizerFormUsername($_POST["username"]);
    $password = FormSanitizer::sanitizerFormPassword($_POST["password"]);

    $success = $account->login($username, $password);
    if ($success) {
        $_SESSION["userLoggedIn"] = $username;
        header('Location: index.php');
    }
}

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <title>Welcome to StudioNet</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/style/style.css" />
</head>


<body>
    <div class="container-fluid showcase">
        <div class="weShouldHaveADiv">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo">
                            <a class="navbar-brand" href="#"><img src="./assets/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="register.php" class="btn navbar-btn">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="column">
                <div class="header">
                    <h3>Sign In</h3>
                </div>
                <form method="POST" action="">
                    <?php echo $account->getError(Constants::$LoginFailed); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="username" name="username" value="<?php getInputValue("username") ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="password" name="password" required>
                    </div>

                    <input type="submit" class="btn btn-default" name="submitButton" value="LOGIN">
                </form>
                <div class="signInMessage">
                    <p>Need an account? <a href="register.php">Sign up</a></p>

                </div>
            </div>
        </div>


    </div>
    <footer class="section bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Information</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="">Pages</a></li>
                            <li><a href="">Our Team</a></li>
                            <li><a href="">Feuchers</a></li>
                            <li><a href="">Pricing</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Ressources</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="">Monitoring Grader </a></li>
                            <li><a href="">Video Tutorial</a></li>
                            <li><a href="">Term &amp; Service</a></li>
                            <li><a href="">Zeeko API</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Help</h6>
                        <ul class="list-unstyled footer-link mt-4">
                            <li><a href="">Sign Up </a></li>
                            <li><a href="">Login</a></li>
                            <li><a href="">Terms of Services</a></li>
                            <li><a href="">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="">
                        <h6 class="footer-heading text-uppercase text-white">Contact Us</h6>
                        <p class="contact-info mt-4">Contact us if need help withanything</p>
                        <p class="contact-info">+01 123-456-7890</p>
                        <div class="mt-5">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab facebook footer-social-icon  fa fa-facebook-f"></i></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab twitter footer-social-icon fa fa-twitter"></i></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab google footer-social-icon fa fa-google"></i></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab apple footer-social-icon fa fa-apple"></i></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center mt-5">
            <p class="footer-alt mb-0 f-14">2019 © maipato, All Rights Reserved</p>
        </div>
    </footer>


</body>

</html>