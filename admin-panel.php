<?php
    require_once 'config/Connect.php';

    if( isset( $_COOKIE['login'] ) )
    {
        $json = json_decode( $_COOKIE['login'], true );
    }

    if( $json['role'] != 'Admin' )
    {
        $functions->go( SITE_URL."blog" );
    }
?>
<?php
    if( isset( $_COOKIE['login'] ) )
    {
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
    <link rel="stylesheet" type="text/css" href="css/blog-mobile.css" />

    <title> Blau - Event & More | Admin Panel </title>
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
            #logout {
                text-decoration: none;
                position: fixed;
                top: 25px;
                right: 25px;
                border: 1px solid #3333ff;
                border-radius: 10px;
                background-color: transparent;
                color: #3333ff;
                padding: 10px;
                transition: .4s ease;
            }

            #logout:hover {
                background-color: #3333ff;
                color: #ffffff;
                opacity: .4;
                transition: .4s ease;
            }

            @media screen and ( max-width: 992px ) {
                #logout {
                    position: absolute;
                    border: 1px solid #3333ff;
                    background-color: #3333ff;
                    color: #ffffff;
                }

                #logout:hover {
                    position: absolute;
                    border: 1px solid #3333ff;
                    background-color: #3333ff;
                    color: #ffffff;
                }
            }
        </style>

        <style type="text/css">
            .blau-admin-information {
                position: absolute;
                top: 100px;
                left: 710px;
                text-align: center;
                user-select: none;
                -ms-user-select: none;
                -moz-user-select: none;
                -webkit-user-select: none;
            }

            .blau-admin-information-item-a {
                color: #ffffff;
                text-decoration: none;
            }

            .blau-admin-information-title-item-h2 {
                color: #ffffff;
            }

            .blau-write-admin-blog {
                position: absolute;
                top: 200px;
                left: 680px;
                text-align: center;
                user-select: none;
                -ms-user-select: none;
                -moz-user-select: none;
                -webkit-user-select: none;
            }

            .blau-write-admin-blog-title-item-h2 {
                color: #ffffff;
            }

            .blau-write-admin-blog-form {
                margin-top: 5%;
                text-align: center;
            }

            #file {
                display: none;
            }

            .blau-write-admin-blog-form #files {
                border: 1px solid #3333ff;
                border-radius: 10px;
                color: #3333ff;
                padding: 10px 60px;
                cursor: pointer;
                transition: .4s ease;
            }

            .blau-write-admin-blog-form #files:hover {
                background-color: #3333ff;
                color: #ffffff;
                opacity: .4;
                transition: .4s ease;
            }

            .blau-write-admin-blog-form #title {
                border: 1px solid #3333ff;
                border-radius: 10px;
                background-color: transparent;
                padding: 10px;
                width: 150%;
                margin-left: -25%;
                color: #ffffff;
                transition: .4s ease;
            }

            .blau-write-admin-blog-form #blog-texty {
                margin-left: -25%;
                border: 1px solid #3333ff;
                border-radius: 10px;
                background-color: transparent;
                padding: 10px;
                width: 150%;
                resize: none;
                color: #ffffff;
            }

            .blau-write-admin-blog-form #share {
                border: 1px solid #3333ff;
                border-radius: 10px;
                background-color: transparent;
                color: #3333ff;
                height: 40px;
                width: 100%;
                cursor: pointer;
                transition: .4s ease;
                font-size: 18px;
            }

            .blau-write-admin-blog-form #share:hover {
                background-color: #3333ff;
                color: #ffffff;
                opacity: .4;
                transition: .4s ease;
            }
        </style>
        <div class="blau-admin-information" id="blau-information">
            <div class="blau-admin-information-title" id="blau-admin-information-title">
                <h2 class="blau-admin-information-title-item-h2" id="blau-admin-information-title-item-h2">
                    Admin Bilgileri
                </h2>
            </div>
            <ul class="blau-admin-information-item-ul" id="blau-admin-information-item-ul">
                <li class="blau-admin-information-item-li" id="blau-admin-information-item-li">
                    <p class="blau-admin-information-item-a" id="admin-name">
                        <?= $json['name']; ?>
                    </p>
                </li>
                <li class="blau-admin-information-item-li" id="blau-admin-information-item-li">
                    <a href="mailto:<?= $json['email']; ?>" class="blau-admin-information-item-a" id="admin-name">
                        <?= $json['email']; ?>
                    </a>
                </li>
            </ul>
        </div>

        <div class="blau-write-admin-blog" id="blau-write-admin-blog">
            <div class="blau-write-admin-blog-title" id="blau-write-admin-blog">
                <h2 class="blau-write-admin-blog-title-item-h2" id="blau-write-admin-blog-title">
                    Shared a blog
                </h2>
            </div>
            <br>
            <form action="" method="POST" autocomplete="off" enctype="multipart/form-data" class="blau-write-admin-blog-form" id="blau-write-admin-blog-form">
                <input type="file" name="file" id="file" />
                <label for="file" id="files">
                    Pick up a photo
                </label>
                    <br>
                    <br>
                <input type="text" name="title" id="title" placeholder="Blog Title" />
                    <br>
                    <br>
                <textarea name="blog-texty" id="blog-texty" cols="30" rows="10" placeholder="Blog Text"></textarea>
                    <br>
                    <br>
                <button name="share" id="share">
                    Share
                </button>
            </form>
            <?php
                if( isset( $_POST['share'] ) )
                {
                    if( $_FILES )
                    {
                        $title = $functions->formControl( 'title' );
                        $blogText = $functions->formControl( 'blog-texty' );
                        $blogUrl = $functions->sef( $title );
                        $date = date("d.m.Y H:i:s");

                        $folder = 'images/blog-photos/';
                        $image = $_FILES['file'];
                        $tmp_name = $image['tmp_name'];
                        $url = substr( $image['name'], -4 ,4 );
                        $new_name = $functions->url( 8 ).$url;
                        $upload = $folder.$new_name;

                        if( $url != '.jpg' && $url != '.JPG' && $url != '.png' && $url != '.PNG' )
                        {
                            echo 'NO';
                            exit();
                        }

                        else if( !file_exists( $folder ) )
                        {
                            mkdir( 'images/blog-photos' );
                        }

                        else
                        {
                            if( move_uploaded_file( $tmp_name, $upload ) )
                            {
                                $share = $connect->db->prepare("INSERT INTO bloglar SET blog_paylasan_id = ?, blog_baslik = ?, blog_resim = ?, blog_yazisi = ?, blog_tarihi = ?, blog_linki = ?");
                                $okayzy = $share->execute(
                                    array(
                                        $json['id'],
                                        $title,
                                        $new_name,
                                        $blogText,
                                        $date,
                                        $blogUrl
                                    )
                                );

                                if( $okayzy )
                                {
                                    echo '<p style="color: #ffffff;"><b>Sharing is successfully...</b></p>';
                                    //exit();
                                }

                                else
                                {
                                    echo '<p style="color: #ffffff;"><b>Blog is not sharing...</b></p>';
                                    exit();
                                }
                            }
                        }
                    }
                }
            ?>
        </div>

        <style type="text/css">
        .blau-sign-in-up-btn {
            position: fixed;
            top: 75px;
            right: 26px;
        }

        #adminy {
            border: 1px solid #3333ff;
            border-radius: 10px;
            background-color: transparent;
            color: #3333ff;
            height: 40px;
            padding: 8px;
            cursor: pointer;
            transition: .4s ease;
            font-size: 15px;
        }

        #adminy:hover {
            background-color: #3333ff;
            color: #ffffff;
            opacity: .4;
            transition: .4s ease;
        }

        @media screen and ( max-width: 992px ) {
            .blau-sign-in-up-btn {
                position: absolute;
                top: 610px;
                right: 10px;
            }

            #adminy {
                background-color: #3333ff;
                color: #ffffff;
                opacity: .4;
            }
        }
    </style>

    <?php
        if( isset( $_COOKIE['login'] ) && $json['role'] == 'Admin' )
        {
    ?>
            <div class="blau-sign-in-up-btn" id="blau-sign-in-up-btn">
                <button id="adminy">
                    Go Back
                </button>
            </div>
    <?php
        }
    ?>

        <a id="logout" href="<?= SITE_URL."logout?id=".$json['id']; ?>">
            Logout
        </a>

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
    <script type="text/javascript">
        const signUpBtn = document.getElementById('sign-btn')
        const signInBtn = document.getElementById('sign-in-btn')

        signUpBtn.addEventListener('click', () => {
            window.location.href = 'http://localhost/blau/sign-up'
        })

        signInBtn.addEventListener('click', () => {
            window.location.href = 'http://localhost/blau/sign-in'
        })
    </script>
    <script type="text/javascript">
        const adminy = document.getElementById('adminy')

        adminy.addEventListener('click', () => {
            window.location.href = 'http://localhost/blau/'
        })
    </script>
</body>
</html>
<?php
    }
?>