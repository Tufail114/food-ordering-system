<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <p>PAKISTAN'S MOST TRUSTED CLOTHING STORE</p>
</header>

<div class="topnav">
    <a href="index.php">Home</a>
    <a class="active" href="about.php">About</a>
    <?php
        if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
            // User is logged in, display their username
            echo "<p class='user-name'>" . $_SESSION['username'] . "</p>";
            echo '<a class="logout-btn" href="logout.php">Logout</a>';
        } else {
            // User is not logged in, display the login link
            echo '<a href="sign.php">Login/Register</a>';
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
    <section class="about-us"  style="padding-top: 40px;">
        <div class="about">
          <img src="img/hero/sam1.jpg" class="pic">
          <div class="text">
            <h2>About Us</h2>
            <h5>Fashion & <span>Designing</span></h5>
              <p>Welcome to Fashion Flare, your ultimate destination for stylish and trendy fashion! We are passionate about offering a diverse and curated collection of clothing that caters to every individual's unique sense of style. Our mission is to inspire confidence and empower our customers to express themselves through fashion.
                
                Thank you for choosing Fashion Flare. Join us on this exciting fashion journey, and together, let's make every day a stylish and confident one!</p>
            <div class="data">
            <a href="#" class="hire">Order Now</a>
            </div>
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
</body>
</html>