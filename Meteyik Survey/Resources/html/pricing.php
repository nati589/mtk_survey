<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/pricing.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Poppins&display=swap" rel="stylesheet">
  <title>Price Comparison Table</title>
</head>

<body>
  <header class="nav-scrolled">
    <div class="header-container">
      <div class="inner-heading">
        <div id="header-logo">
          <span><a href="">mtk</a></span>
        </div>
        <div id="header-nav">
          <ul>
            <a href="../../index.php">
              <li>Home</li>
            </a>
            <a href="#">
              <li>Pricing</li>
            </a>
            <a href="contact.php">
              <li>Contact</li>
            </a>
            <a href="faq.php">
              <li>FAQ</li>
            </a>
          </ul>
        </div>
        <div id="header-menu">
          <ul>
            <a href="login.php">
              <li>Login</li>
            </a>
            <a href="usersignup.php">
              <li>Sign Up</li>
            </a>
            <button onclick="hamBurger()">
              <li></li>
            </button>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <section class="price-comparison">
    <div class="price-column">
      <div class="price-header">
        <div class="price">
          <div class="dollar-sign">$</div>
          10
          <div class="per-month">/mo</div>
        </div>
        <div class="plan-name">Basic</div>
      </div>
      <div class="divider"></div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature A
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature B
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Feature C
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Feature D
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Feature E
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Feature F
      </div>
      <button class="cta">Start Today</button>
    </div>
    <div class="price-column popular">
      <div class="most-popular">Most Popular</div>
      <div class="price-header">
        <div class="price">
          <div class="dollar-sign">$</div>
          20
          <div class="per-month">/mo</div>
        </div>
        <div class="plan-name">Professional</div>
      </div>
      <div class="divider"></div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature A
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature B
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature C
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature D
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Feature E
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Feature F
      </div>
      <button class="cta">Start Today</button>
    </div>
    <div class="price-column">
      <div class="price-header">
        <div class="price">
          <div class="dollar-sign">$</div>
          50
          <div class="per-month">/mo</div>
        </div>
        <div class="plan-name">Enterprise</div>
      </div>
      <div class="divider"></div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature A
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature B
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature C
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature D
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature E
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Feature F
      </div>
      <button class="cta">Start Today</button>
    </div>
  </section>
</body>

</html>