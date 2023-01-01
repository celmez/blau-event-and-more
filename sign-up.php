<?php require_once 'config/Connect.php'; ?>
<?php
    if( isset( $_COOKIE['login'] ) )
    {
        $functions->go( SITE_URL );
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

    <link rel="icon" type="img/icon" href="#" />

    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/about.css" />
    <link rel="stylesheet" type="text/css" href="css/sign-up.css" />

    <title> Blau - ABOUT </title>
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
                        <a href="<?= SITE_URL."comp-we-off"; ?>">
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
                    <li>
                        <a href="<?= SITE_URL."sign-in"; ?>">
                            SIGN IN
                        </a>
                    </li>
                    <li>
                        <a href="<?= SITE_URL."sign-up"; ?>">
                            SIGN UP
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="blau-sign-up-form" id="blau-sign-up-form">
        <div class="blau-sign-up-form-title" id="sign-up-form-title">
            <h2 class="blau-sign-up-form-title-item-h2" id="blau-sig-up-form-title-item-h2">
                Sign Up
            </h2>
        </div>
        <form action="" method="POST" autocomplete="off">
            <input type="text" name="name" id="name" placeholder="Name Surname" />
                <br>
                <br>
            <input type="text" name="email" id="email" placeholder="E-Mail Address" />
                <br>
                <br>
            <input type="password" name="password" id="password" placeholder="Password" />
                <br>
                <br>
            <input type="password" name="re_password" id="re_password" placeholder="Re-type Password" />
                <br>
                <br>
            <button name="sign" id="sign">
                Sign Up
            </button>
                <br>
                <br>
            <a href="sign-in.html" id="already">
                I have already an account
            </a>
        </form>
        <?php
            if( isset( $_POST['sign'] ) )
            {
                $name = $functions->formControl( 'name' );
                $email = $functions->formControl( 'email' );
                $password = $functions->formControl( 'password' );
                $re_password = $functions->formControl( 're_password' );
                $hash = $functions->encrypt( $password );
                $date = date("d.m.Y H:i:s");

                if( empty( $name ) || empty( $email ) || empty( $password ) || empty( $re_password ) )
                {
                    echo '<b>Please fill in the all blanks</b>';
                    exit();
                }

                elseif( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
                {
                    echo '<b>Please check your email</b>';
                    exit();
                }

                else if( $password != $re_password )
                {
                    echo '<b>Your passwords is not matching</b>';
                    exit();
                }

                else
                {
                    $sign = $connect->db->prepare("SELECT * FROM uyeler WHERE isim=:name OR eposta=:email");
                    $sign->execute(
                        array(
                            'name' => $name,
                            'email' => $email
                        )
                    );
                    $count = $sign->rowCount();

                    if( $count != 0 )
                    {
                        echo '<b>This user is already signed</b>';
                        exit();
                    }

                    else
                    {
                        $add = $connect->db->prepare("INSERT INTO uyeler SET isim = ?, eposta = ?, sifre = ?, kayit_tarihi = ?");
                        $ok = $add->execute(
                            array(
                                $name,
                                $email,
                                $hash,
                                $date
                            )
                        );

                        $login = $connect->db->query("SELECT * FROM uyeler WHERE eposta = '$email' AND sifre = '$hash' ")->fetch();

                        if( $ok )
                        {
                            $cookieArray = array(
                                'id' => $login['id'],
                                'name' => $name,
                                'email' => $email,
                                'password' => $hash,
                                'date' => $date,
                                'role' => $login['rol']
                            );
                            $cookieArray = json_encode( $cookieArray );
                            $okey = $functions->setCookie( 'login', $cookieArray, time()+60*60*24*1 );

                            if( $okey )
                            {
                                $functions->go( SITE_URL."blog" );
                            }
                        }

                        else
                        {
                            echo 'We are sorry. You can not sign up to our web site';
                            exit();
                        }
                    }
                }
            }
        ?>
    </div>

    <h2 id="contact-us-title-item-h2">
        Contact Us
    </h2>
    <br>

    <footer class="blau-footer" id="blau-footer">
        <div class="blau-footer-title" id="blau-footer-title">
            <div class="blau-footer-title-item-1" id="blau-footer-title-item-2"></div>
        </div>
        <form action="" method="POST" autocomplete="off">
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

    <div class="designed-by" id="designed-by">
        <p class="designed-by-item-p">
            ©2022 Designed by <b>CELMEZ</b>
        </p>
    </div>

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