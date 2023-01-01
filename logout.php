<?php
    require_once 'config/Connect.php';

    $id = @$_GET['id'];
    $json = json_decode( $_COOKIE['login'], true );

    $control = $connect->db->prepare("SELECT * FROM uyeler WHERE id=:id");
    $control->execute(
        array(
            'id' => $id
        )
    );
    $count = $control->rowCount();

    if( $count != 0 )
    {
        if( $id == $json['id'] )
        {
            $cek = $connect->db->prepare("SELECT * FROM uyeler WHERE id = ?");
            $cek->execute(
                array(
                    $id
                )
            );

            foreach( $cek as $row )
            {
                $okayz = $functions->setCookie( 'login', '', time()-60*60*24*7 );

                if( $okayz )
                {
?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>

                        <link rel="stylesheet" type="text/css" href="<?= SITE_URL."css/reset.css"; ?>" />

                        <style type="text/css">
                            body {
                                background-color: #000000;
                            }
                            h2 {
                                color: #3333ff;
                                text-align: center;
                                font-size: 60px;
                                user-select: none;
                                -ms-user-select: none;
                                -moz-user-select: none;
                                -webkit-user-select: none;
                                margin-top: 18%;
                            }

                            @media screen and ( max-width: 992px ) {
                                h2 {
                                    font-size: 35px;
                                    margin-top: 65%;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <h2>
                            Ana Sayfaya
                            <br>
                            Yönlendiriliyorsunuz!!!
                        </h2>
                    </body>
                    </html>
<?php
                    $functions->go( SITE_URL."blog", 3 );
                    exit();
                }
            }
        }

        else
        {
            echo 'Maalesef bu kullanıcı siz olmadığınız için maalesef çıkış yapamazsınız';
            exit();
        }
    }

    else
    {
        echo 'NO';
    }
?>