<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Natan Mekebib">
    <meta name="description" content="Fill out surveys get rewards">
    <meta name="keywords" content="Survey Form Research meteyik mtk Rewards Ethiopia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>መጠይቅ Survey : Form building and distribution</title>
    <link rel="shortcut icon" href="Resources/logo.png">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <link rel="stylesheet" href="Resources/css/index.css">
    <link rel="stylesheet" href="Resources/css/style.css">
    <base href="index.php" target="_self">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="inner-heading">
                <div id="header-logo">
                    <span><a href="">mtk</a></span>
                </div>
                <div id="header-nav">
                    <ul>
                        <a href="">
                            <li>Home</li>
                        </a>
                        <a href="Resources/html/pricing.php">
                            <li>Pricing</li>
                        </a>
                        <a href="Resources/html/contact.php">
                            <li>Contact</li>
                        </a>
                        <a href="Resources/html/faq.php">
                            <li>FAQ</li>
                        </a>
                    </ul>
                </div>
                <div id="header-menu">
                    <ul>
                        <a href="Resources/html/login.php">
                            <li>Login</li>
                        </a>
                        <a href="Resources/html/usersignup.php">
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
    <aside>
        <div id="asideinfo">
            <ul>
                <li>
                    <a href="">Home</a>
                </li>
                <li>
                    <a href="Resources/html/pricing.php">Pricing</a>
                </li>
                <li>
                    <a href="Resources/html/contact.php">Contact</a>
                </li>
                <li>
                    <a href="Resources/html/faq.php">FAQ</a>
                </li>
            </ul>
        </div>
        <div id="signin">
            <ul>
                <li>
                    <a href="Resources/html/login.php">Login</a>
                </li>
                <li>
                    <a href="Resources/html/usersignup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="ta-center">
        <section id="herosection">
            <div>
                <h1>Accelerate innovation <br>with <em> data! </em> </h1>
                <p>
                    A survey platform where you get verified data for your business needs. <br> We also offer users rewards for filling out surveys.
                </p>
                <a href="#accounts" class="herobutton">Get Started</a>
            </div>
        </section>
        <section id="benefits">
            <h2>Why choose <span>mtk Survey</span>?</h2>
            <div id="benefits_container">
                <div class="benefit example">
                    <img src="Resources/images/simplicity.jpg" alt="nothinghere">
                    <h3>Simplicity</h3>
                    <p class="example">
                        Fill out all the required information, after that enjoy all the payments and rewards you want.
                    </p>

                </div>
                <div class="benefit example">
                    <img src="Resources/images/flexibility.jpg" alt="Man looking at watch">
                    <h3>Flexibility</h3>
                    <p class="example">
                        Fill out surveys and get paid
                        wherever and whenever you feel like it
                    </p>
                </div>
                <div class="benefit example">
                    <img src="Resources/images/targeting.jpg" alt="People sitting and talking">
                    <h3>User Targeting</h3>
                    <p class="example">
                        Organizations receive access to all the users available on our platform.
                    </p>
                </div>
                <div class="benefit example">
                    <img src="Resources/images/verification.jpg" alt="Discussion">
                    <h3>Information Verification</h3>
                    <p class="example">
                        Information collected from users is thoroughly verified.
                    </p>
                </div>
            </div>
        </section>
        <section id="testimonial" class="ta-center">
            <h2>What they say about us?</h2>
            <div id="testimony_container">
                <div class="testimonybox example" id="t1">
                    <img src="Resources/images/user1.jpg" alt="">
                    <h3>
                        Yohannes Kassa
                    </h3>
                    <q>
                        A friend told me about the services available on mtk and I just had to see for myself if it was true. And I’m glad to say I am quite satisfied.
                    </q>
                </div>
                <div class="testimonybox example" id="t2">
                    <img src="Resources/images/user3.jpg" alt="">
                    <h3>
                        Yeabsira Haile
                    </h3>
                    <q>The surveys they send me are all based on things I know and honestly I really enjoy taking them. And the payment ain't too bad either!</q>
                </div>
                <div class="testimonybox example" id="t3">
                    <img src="Resources/images/user4.jpg" alt="">
                    <h3>
                        Harry Feleke
                    </h3>
                    <q>
                        The fact that I'm getting all these rewards for just 5 minutes of my time is amazing!
                    </q>
                </div>
                <div class="testimonybox example" id="t4">
                    <img src="Resources/images/user2.jpg" alt="">
                    <h3>
                        Eyonadab Asrat
                    </h3>
                    <q>
                        My company has been looking for a way to collect data on user reaction to sports wear and mtk is just what I’ve been looking for.
                    </q>

                </div>
            </div>
            <button id="changebtn1" onclick="changeTestimony(1)" class="selectbtn"></button>
            <button id="changebtn2" onclick="changeTestimony(2)"></button>
            <button id="changebtn3" onclick="changeTestimony(3)"></button>
            <button id="changebtn4" onclick="changeTestimony(4)"></button>
        </section>
        <section id="accounts">
            <div>
                <h2>Start your journey with us now by signing up</h2>
            </div>
            <div id="account">
                <a name="accounts" href="Resources/html/usersignup.php">
                    <div class="button">
                        Individual Account
                    </div>
                </a>
                <a href="Resources/html/orgsignup.php">
                    <div class="button">
                        Organization Account
                    </div>
                </a>
            </div>
        </section>

    </main>
    <footer>
        <div class="ta-center">
            <div class="foot-top">
                <div class="foot">
                    <ul>
                        <li class="logo">
                            mtk&reg;
                        </li>
                        <li>
                            Accelerate innovation with data!
                        </li>
                    </ul>
                </div>
                <div class="foot">
                    <a href="#">
                        meteyik@gmail.com
                    </a>
                </div>
                <div class="foot">
                    <a href="#">
                        <img src="Resources/images/fb.png" alt="Facebook icon">
                    </a>
                    <a href="#">
                        <img src="Resources/images/twitter.png" alt="Twitter icon">
                    </a>
                    <a href="#">
                        <img src="Resources/images/ig.png" alt="Instagram icon" width="45px">
                    </a>
                </div>
            </div>
            <div id="foot-bottom">
                <div id="foot-left">
                    &copy; መጠይቅ Survey PLC 2022
                </div>
                <div id="foot-right">
                    <a href="Resources/html/contact.php">Contact Us</a> |
                    <a href="#">Terms of Service</a> |
                    <a href="#">Privacy Policy</a>
                </div>
            </div>

        </div>
    </footer>
    <script src="Resources/js/index.js"></script>
</body>

</html>