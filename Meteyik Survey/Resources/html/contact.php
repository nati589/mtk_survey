<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Natan Mekebib">
    <meta name="description" content="Fill out surveys get rewards">
    <meta name="keywords" content="Survey Form Research meteyik mtk Rewards contact us ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="shortcut icon" href="Resources/logo.png">
    <link href='https://fonts.googleapis.com/css?family=Bree Serif' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/index.css"> -->
    <link rel="stylesheet" href="../css/contact.css">
    <script src="../js/index.js"></script>
    <!-- <script src="../js/formgenerator.js"></script> -->
    <base href="../../index.php" target="_self">


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
                        <a href="">
                            <li>Home</li>
                        </a>
                        <a href="Resources/html/contact.php">
                            <li>Contact</li>
                        </a>
                        <a href="Resources/html/pricing.php">
                            <li>Pricing</li>
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
                    <a href="Resources/html/form.php">BUILD</a>
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
    <main>
        <section id="contact-top">
            <h1>Contact Us</h1>
            <p>
                For further assistance or if you have any issues please contact us with the information provided below.
            </p>
        </section>
        <section id="contactbox">
            <div id="contactinfo">
                <div class="contact">
                    <div>
                        <img src="Resources/images/locationpic.png" alt="">
                    </div>
                    <div>
                        <h3>Address</h3>
                        <p>
                        <address>
                            1281 Bole Road, <br>
                            Addis Ababa, Ethiopia <br>
                        </address>
                        </p>
                    </div>
                </div>
                <div class="contact">
                    <div>
                        <img src="Resources/images/phonepic.png" alt="">
                    </div>
                    <div>
                        <h3>Phone</h3>
                        <a href="tel:+251946650560">
                            <p>
                                +(251)-94-665-0560
                            </p>
                        </a>

                    </div>
                </div>
                <div class="contact">
                    <div id="emailinfo">
                        <img src="Resources/images/emailpic.png" alt="">
                    </div>
                    <div>
                        <h3>E-mail</h3>
                        <a href="mailto:natimok55@gmail.com">
                            <p>
                                natimok55 @gmail.com
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            <div id="messagebox">
                <form action="">
                    <h3>Send a Message</h3>
                    <div>
                        <input type="textarea" name="fullname" id="fullname" class="textbox" placeholder="Full Name" required>
                    </div>
                    <div>
                        <input type="email" name="email" id="email" class="textbox" placeholder="E-mail" required>
                    </div>
                    <br>
                    <div>
                        <label for="message">Type your message...</label> <br>
                        <input type="textarea" id="message" class="textbox" required>
                    </div>
                    <div>
                        <button type="submit" name="login" class="button-26">Send</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div>
            <p>
                &copy; Copyright mtk Survey PLC 2022
            </p>
        </div>
    </footer>


</body>

</html>