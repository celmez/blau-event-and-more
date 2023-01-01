<?php
    class Functions extends Connect
    {
        public function formControl( $value )
        {
            return strip_tags(trim(htmlspecialchars( $_POST[$value] )));
        }

        public function encrypt( $data )
        {
            return openssl_encrypt( $data, CIPHER, KEY );
        }

        public function decrypt( $data )
        {
            return openssl_decrypt( $data, CIPHER, KEY );
        }

        public function tag( $text )
        {
            $pattern = [];
            $news = [];

            $pattern[0] = '/@([0-9a-zA-Z-_]+)/';
            $pattern[1] = '/#([0-9a-zA-Z-_]+)/';

            $news[0] = '<a href="$1"><b>\1</b></a>';
            $news[1] = '<a href="hashtag/$1">#\1</a>';
        }

        public function url( $url_length = null )
        {
            $wonk = '';
            $letters = 'ABCDEFGHIJKLMNOPRSTUVYZXWQabcdefghijklmnoprstuvyzxwq1234567890';

            for($i=1; $i <= $url_length; $i++)
            {
                $wonk .= mb_substr( $letters,mt_rand(0,mb_strlen($letters)-1),1 );
            }

            return $wonk;
        }

        public function sef( $seo )
        {
            $seo = mb_strtolower( $seo, 'UTF-8' );
            $seo = str_replace(
                [
                    'ı', 'ö', 'ç', 'ş', 'ü', 'ğ'
                ],
                [
                    'i', 'o', 'c', 's', 'u', 'g'
                ],
                $seo
            );

            $seo = preg_replace( '/[^a-z0-9]/', '-',  $seo );
            $seo = preg_replace( '/-+/', '-', $seo );

            return trim( $seo, '-' );
        }

        public function createSession( $array = [] )
        {
            if( count( $array ) != 0 )
            {
                foreach( $array as $key => $value )
                {
                    $_SESSION[$key] = $value;
                }
            }
        }

        public function setCookie( $cookieName, $cookieItems, $cookieTime )
        {
            return setcookie( $cookieName, $cookieItems, $cookieTime, '/' );
        }

        public function go( $url, $time = 0 )
        {
            if( $time != 0 )
            {
                header("Refresh: $time; url= $url");
            }

            else
            {
                header("Location: $url");
            }
        }
    }
?>