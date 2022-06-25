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
          0
          <div class="per-month">/mo</div>
        </div>
        <div class="plan-name">User Account</div>
      </div>
      <div class="divider"></div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Unlimited Surveys
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Withdraw anytime
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        No time limit
      </div>

      <button class="cta">Start Today</button>
    </div>
    <div class="price-column popular">
      <div class="most-popular"></div>
      <div class="price-header">
        <div class="price">
          <div class="dollar-sign">$</div>
          15
          <div class="per-month">/survey</div>
        </div>
        <div class="plan-name">Organization package</div>
      </div>
      <div class="divider"></div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        View all surveys free
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Unlimited Surveys
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Statistics
      </div>
      <button class="cta">Start Today</button>
    </div>
    <div class="price-column">
      <div class="price-header">
        <div class="price">
          <div class="dollar-sign">$</div>
          20
          <div class="per-month">/survey</div>
        </div>
        <div class="plan-name">Trial Organization Package</div>
      </div>
      <div class="divider"></div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        View all surveys free
      </div>
      <div class="feature">
        <img src="../images/check-circle.svg">
        Unlimited Surveys
      </div>
      <div class="feature inactive">
        <img src="../images/x-square.svg">
        Statistics
      </div>
      <button class="cta">Start Today</button>
    </div>
  </section>
</body>

</html>