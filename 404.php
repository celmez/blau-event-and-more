<?php
    require_once 'config/Connect.php';
?>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<style type="text/css">
    .error-message h2 {
        text-align: center;
        color: #3333ff;
        font-weight: bolder;
        font-size: 50px;
        margin-top: 20%;
        user-select: none;
        -ms-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
    }

    .error-message a {
        text-decoration: none;
        color: #ffffff;
        text-align: center;
        margin-left: 46%;
        transition: .4s ease;
        font-size: 20px;
    }

    .error-message a:hover {
        text-decoration: underline;
        transition: .4s each;
    }

    @media screen and ( max-width: 992px ) {
        .error-message h2 {
            margin-top: 70%;
            font-size: 100px;
            user-select: none;
            -ms-user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .error-message a {
            text-decoration: none;
            color: #ffffff;
            text-align: center;
            margin-left: 38%;
            transition: .4s ease;
            font-size: 40px;
        }

        .error-message a:hover {
            text-decoration: none;
            transition: .4s each;
        }
    }
</style>
<div class="error-message">
    <b>
        <h2>
            404 NOT FOUND
        </h2>
    </b>
    <br>
    <a href="<?= SITE_URL; ?>">
        Go back home!
    </a>
</div>