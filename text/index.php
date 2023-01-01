<?php
    require_once '../config/Connect.php';

    if( !isset( $_COOKIE['login'] ) )
    {
        $functions->go( SITE_URL."sign-in" );
    }

    $blog = @$_GET['b'];
    $json = json_decode( $_COOKIE['login'], true );
    
    if( $blog == '' )
    {
        $functions->go( SITE_URL."blog" );
    }

    else
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

            <link rel="stylesheet" type="text/css" href="<?= SITE_URL; ?>css/reset.css" />
            <link rel="stylesheet" type="text/css" href="<?= SITE_URL; ?>css/style.css" />
            <link rel="stylesheet" type="text/css" href="<?= SITE_URL; ?>css/blog-mobile.css" />

            <style type="text/css">
                .blog-comment-area {
                    margin-top: 2%;
                    margin-left: 34%;
                }

                #comment {
                    border: 1px solid #3333ff;
                    background-color: transparent;
                    color: #3333ff;
                    width: 50%;
                    resize: none;
                    padding: 10px;
                }

                #send-to-comment {
                    border: 1px solid #3333ff;
                    border-radius: 10px;
                    background-color: transparent;
                    color: #3333ff;
                    padding: 10px 20px;
                    width: 50%;
                    cursor: pointer;
                    transition: .4s ease;
                }

                #send-to-comment:hover {
                    background-color: #3333ff;
                    color: #ffffff;
                    opacity: .4;
                }

                .blau-all-comment {
                    margin-left: 45%;
                }

                .blau-all-comment ul li p {
                    text-align: left;
                    color: #ffffff;
                }

                @media screen and ( max-width: 992px ) {
                    #comment {
                        width: 100%;
                        margin-left: -22%;
                    }
                }
            </style>

            <title>
                <?php
                    $pageTitle = $connect->db->prepare("SELECT * FROM bloglar WHERE blog_linki = ?");
                    $pageTitle->execute(
                        array(
                            $blog
                        )
                    );
                    $countPageTitle = $pageTitle->rowCount();

                    if( $countPageTitle )
                    {
                        foreach( $pageTitle as $titlePage )
                        {
                            echo "Blau - Event & More | ".$titlePage['blog_baslik'];
                        }
                    }
                ?>
            </title>
        </head>
        <body>
            <nav class="blau-header" id="blau-header">
                <div class="blau-logo" id="logo">
                    <a href="<?= SITE_URL; ?>">
                        <img src="<?= SITE_URL; ?>images/other-photos/blau-logo-500x500.png" class="blau-logo-item-img" id="item-img" />
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

            <?php
                $cek = $connect->db->prepare("SELECT * FROM bloglar WHERE blog_linki = ?");
                $cek->execute(
                    array(
                        $blog
                    )
                );
                $count = $cek->rowCount();

                if( $count != 0 )
                {
                    foreach( $cek as $row )
                    {
            ?>
                        <div class="blau-blog" id="blau-blog">
                            <div class="blau-blog-title" id="blau-blog-title">
                                <img src="<?= SITE_URL."images/blog-photos/".$row['blog_resim']; ?>" class="blog-image" />
                                <h2 class="blau-blog-title-item-h2" id="blau-blog-title-item-h2">
                                    <?= $row['blog_baslik']; ?>
                                </h2>
                            </div>
                        
                            <div class="blau-blog-text" id="blau-blog-text">
                                <p class="blau-blog-text-item-p" id="blau-blog-text-item-p">
                                    <?= $row['blog_yazisi']; ?>
                                </p>
                            </div>
                        </div>
            <?php
                    }
                }

                else
                {
                    echo '<div style="text-align: center; color: #ffffff; user-select: none; -ms-user-select: none; -moz-user-select: none; -webkit-user-select: none;"><b>Do not have blog</b></div>';
                }
            ?>

                        <div class="blog-comment-area" id="blog-comment-area">
                            <form action="" method="POST" autocomplete="off">
                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Comments"></textarea>
                                    <br>
                                    <br>
                                <button name="send_to_comment" id="send-to-comment">
                                    Send
                                </button>
                            </form>
                        </div>

                        <br>
            
            <?php
                if( isset( $_POST['send_to_comment'] ) )
                {
                    $comment = $functions->formControl( 'comment' );
                    $id = $json['id'];

                    if( empty( $comment ) )
                    {
                        echo '<b>Please writing something!!!</b>';
                        exit();
                    }

                    else
                    {
                        $make = $connect->db->prepare("INSERT INTO yorumlar SET yorum_yapilan_id = ?, yorum_yapan_id = ?, yorum = ?");
                        $okayz = $make->execute(
                            array(
                                $row['id'],
                                $id,
                                $comment
                            )
                        );

                        if( $okayz ) {
                            $functions->go( SITE_URL."text/".$row['blog_linki'] );
                        }
                    }
                }
            ?>

            <br>

            <?php
                $pregComments = $connect->db->prepare("SELECT * FROM bloglar WHERE blog_linki = ?");
                $pregComments->execute(
                    array(
                        $blog
                    )
                );
                $fetchyComment = $pregComments->fetch( PDO::FETCH_ASSOC );

                $cekComments = $connect->db->prepare("SELECT * FROM yorumlar WHERE yorum_yapilan_id = ? ORDER BY ID DESC");
                $cekComments->execute(
                    array(
                        $fetchyComment['id']
                    )
                );
                $countComments = $cekComments->rowCount();

                $userComments = $connect->db->prepare("SELECT * FROM uyeler WHERE id = ?");
                $userComments->execute(
                    array(
                        $json['id']
                    )
                );
                $valueComments = $userComments->fetch( PDO::FETCH_ASSOC );
            ?>
                <h2 style="text-align: center; color: #ffffff; user-select: none; -ms-user-select: none; -moz-user-select: none; -webkit-user-select: none;">
                    <?= "Comments ( ".$countComments." )"; ?>
                </h2>
            <?php

                if( $countComments != 0 )
                {
                    foreach( $cekComments as $rowComments )
                    {
            ?>
                        <style type="text/css">
                            .blau-all-comment {
                                user-select: none;
                                -ms-user-select: none;
                                -moz-user-select: none;
                                -webkit-user-select: none;
                            }

                            .blau-all-comment ul li {
                                text-align: center;
                            }
                        </style>

                        <br>
                        
                        <div class="blau-all-comment" id="blau-all-comment">
                            <ul>
                                <li>
                                    <p>
                                        <?= $valueComments['isim']; ?>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <?= $rowComments['yorum']; ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                            <br>
                            <br>
            <?php
                    }
                }

                else
                {
            ?>
                    <h2 style="text-align: center; color: #ffffff;">
                        No comments yet
                    </h2>
            <?php
                }
            ?>

            <br>

            <h2 id="blog-page-contact-us-title">
                Contact Us
            </h2>
            <br>

            <footer class="blau-footer" id="blau-footer">
                <div class="blau-footer-title" id="blau-footer-title">
                    <div class="blau-footer-title-item-1" id="blau-footer-title-item-2"></div>
                </div>
                <form action="../send-mail.php" method="POST" autocomplete="off">
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
<?php
    }
?>