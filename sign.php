<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>

    <link rel="stylesheet" href="style.css">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <p>PAKISTAN'S MOST TRUSTED CLOTHING STORE</p>
    </header>

    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <?php
        if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
            // User is logged in, display their username
            echo "<p class='user-name'>Welcome, " . $_SESSION['username'] . "!</p>";
            echo '<a class="logout-btn" href="logout.php">Logout</a>';
        } else {
            // User is not logged in, display the login link
            echo '<a href="sign.php" class="active">Login/Register</a>';
        }
        ?>
    </div>

    <nav>
        <center>
            <img src="img/logo.png_v=1626261700" alt="">
        </center>
    </nav>
    

    <div class="bottom-nav">
        <ul>
            <li><a href=""> NEW ARRIVALS </a></li>
            <li><a href=""> CHIFFON </a></li>
            <li><a href=""> LAWN/COTTON </a></li>
            <li><a href=""> MARIA B </a></li>
            <li><a href=""> JUST RESTOCKED </a></li>
            <li><a href=""> WINTER </a></li>
            <li><a href=""> WEDDING </a></li>
            <li><a href=""> BRANDS </a></li>
            <li><a href=""> MEN'S </a></li>
            <li><a href=""> SALE </a></li>
        </ul>
    </div>

    <hr>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>

                <form action="login_process.php" method="post">
                    <div class="feild input-feild">
                        <input type="email" placeholder="Email" class="input" name="username">
                    </div>

                    <div class="feild input-feild">
                        <input type="password" placeholder="password" class="password" name="password">
                    </div>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="feild button-feild">
                        <button type="submit">Login</button>
                    </div>
                    <div>
                        <?php 
                         if (isset($_SESSION['error'])) {
                            echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                            unset($_SESSION['error']); // Clear the error message after displaying it
                        }
                        ?>
                    </div>
                    <br>
                    
                    <!--<div class="form-link">
                        <span>Already have an account? <a href="#" class="link signup-link">Signup</a></span>
                    </div>-->
                </form>
            </div>
        </div>

        <!-- signup form -->

        <div class="form signup">
            <div class="form-content">
                <header>Sign Up</header>

                <form action="signup_process.php" method="post">
                    <div class="feild input-feild">
                        <input type="text" placeholder="User Name" class="input" name="username">
                    </div>
                    <div class="feild input-feild">
                        <input type="email" placeholder="Email" class="input" name="email">
                    </div>

                    <div class="feild input-feild">
                        <input type="password" placeholder="Password" class="password" name="password">
                    </div>

                    <div class="feild button-feild">
                        <button type="submit">Sign up</button>
                    </div>
                    <div>
                        <?php 
                            if (isset($_SESSION['signup_error'])) {
                                echo "<p style='color: red;'>" . $_SESSION['signup_error'] . "</p>";
                                unset($_SESSION['signup_error']); // Clear the error message after displaying it
                            }
                        ?>
                    </div>
                    <!-- <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                    </div> -->
                </form>
            </div>
        </div>
    </section>

    <div class="thin-footer">
        <h4 id="helo">100% Satisfaction Guaranteed</h4>
        <h4 id="helo">Free Cash On Delivery</h4>
        <h4 id="hilo">7 Days Exchange Policy</h4>
    </div>

    <footer>
        <div>
            <div><a href="about.php" class="active">About Us</a></div>
            <div><a href="#">Features</a></div>
            <div><a href="#">New Collection</a></div>
            <div><a href="#">News & Blog</a></div>
        </div>
        <div>
            <h4>LINKS</h4>
            <p>Exchange Policy</p>
        </div>
        <div>
            <h4>STAY IN TOUCH</h4>
        </div>
    </footer>
    <div>
        <p class="txt-center">All Rights Reserved</p>
    </div>

    <!-- javascrit -->

    <script src="script.js"></script>
</body>
</html>