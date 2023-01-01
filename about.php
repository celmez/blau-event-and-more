<?php require_once 'config/Connect.php'; ?>
<?php
    if( isset( $_COOKIE['login'] ) )
    {
        $json = json_decode( $_COOKIE['login'], true );
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="keywords" content="" /> <!--Internet sitesi ile ilgigi anahtar kelimeler-->
    <meta name="description" content=""/> <!--Internet sitesi ile ilgili açıklamalar-->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!--<link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css" />-->

    <link rel="icon" type="img/icon" href="http://localhost/images/other-photos/" />

    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/about.css" />

    <title> Blau - Event & More | ABOUT </title>
</head>
<body>
    <nav class="blau-header" id="blau-header">
        <div class="blau-logo" id="logo">
            <a href="<?= SITE_URL; ?>">
                <img src="images/other-photos/blau-logo-500x500.png" class="blau-logo-item-img" id="item-img" />
            </a>
            <a id="open-menu" style="text-align: center;">MENU</a>
            <div class="blau-menu" id="blau-menu">
                <ul>
                    <li>
                        <a href="<?= SITE_URL; ?>">
                            HOME
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL."about"; ?>">
                            ABOUT
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL."our-team"; ?>">
                            OUR TEAM
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL."comp-we-offer"; ?>">
                            COMP WE OFFER
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL."blog" ?>">
                            BLOG
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL."contact-us"; ?>">
                            CONTACT US
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <style type="text/css">
        #contact-us-title-item-h2 {
                margin-top: 2%;
                user-select: none;
                -ms-user-select: none;
                -moz-user-select: none;
                -webkit-user-select: none;
            }
        @media screen and ( max-width: 992px ) {
            .blau-logo-item-img {
                margin-top: 100%;
                margin-left: 40%;
            }

            #blau-about-we-us-item-img {
                height: 320px;
                margin-left: 4%;
            }

            .about-we-us-item-p {
                width: 80%;
                margin-left: 12%;
            }

            #contact-us-title-item-h2 {
                margin-top: 10%;
                margin-left: 30%;
            }

            .about-we-us-title-item-h2 {
                margin-left: 6%;
            }
        }
    </style>

    <div class="blau-about-we-us" id="blau-about-we-us">
        <img id="blau-about-we-us-item-img" src="images/other-photos/Giriş Sayfası Foto2.jpg" height="500" style="text-align: center;" />
        <h2 class="about-we-us-title-item-h2" id="about-we-us-title-item-h2">
            Who we are?
        </h2>
        <p class="about-we-us-item-p" id="about-we-us-item-p">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa eius atque, saepe, ratione numquam blanditiis quae harum consectetur deleniti eum doloribus accusantium quidem modi vitae provident possimus. Autem, iusto quidem?
            Quas, quos. Aut earum reiciendis ipsa nesciunt debitis magnam velit deleniti provident quaerat quasi reprehenderit magni facilis, quo, enim officiis delectus. Cumque quae distinctio in voluptate non animi, ipsam exercitationem.
        </p>
    </div>

    <h2 id="contact-us-title-item-h2">
        Contact Us
    </h2>
    <br>

    <footer class="blau-footer" id="blau-footer">
        <div class="blau-footer-title" id="blau-footer-title">
            <div class="blau-footer-title-item-1" id="blau-footer-title-item-2"></div>
        </div>
        <form action="send-mail.php" method="POST" autocomplete="off">
            <input type="text" name="mail" id="mail" placeholder="E-Mail Address" />
                <br>
                <br>
            <input type="text" name="insta" id="insta" placeholder="Instagram Name" />
                <br>
                <br>
            <input type="text" name="tel" id="tel" placeholder="Phone Number" />
                <br>
                <br>
            <textarea name="message" id="message" cols="80" rows="10" placeholder="Leave us a note, we will contact you!"></textarea>
                <br>
                <br>
            <button name="send" id="send">
                Send
            </button>
        </form>
    </footer>
    <br>

    <div class="blau-information" id="blau-information">
        <p class="blau-information-item-p" id="blau-informaton-item-p">
            info@blauevent.com.tr
                <br>
            0212 551 4623
                <br>
            Adress: Bebek, 34342 Beşiktaş/İstanbul.
        </p>
    </div>

    <br>

    <!--Section of JavaScript-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
    <!--<script type="text/javascript" src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {
            var distance = $(window).scrollTop();

            if( distance == 0 )
            {
                $('.designer').css('opacity', '0')
            }

            else if( distance > 100 )
            {
                $('.designer').css('opacity', '1')
            }
            //console.log(distance)
        })
    </script>
    <script type="text/javascript">
        const stickyMenu = document.getElementById('blau-menu')
        const openMenu = document.getElementById('open-menu')

        openMenu.addEventListener('click', () => {
            stickyMenu.classList.toggle('blau-menu-open')
        })
    </script>
</body>
</html>