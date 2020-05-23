<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>m-barber.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/') ?>logoRGB.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,600;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.min.css') ?>">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <style>
        html {
            scroll-behavior: smooth;
        }

        nav {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: black;
            font-family: 'Montserrat', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .carousel-caption h5,
        p {
            color: #333333;
        }

        /* label {
            color: #d4d4d4;
        } */

        hr {
            /* margin-top: 5rem;
            margin-bottom: 5rem; */
            border: 0;
            border-top: 5px solid rgba(0, 0, 0, 0.1);
            background-color: azure;
        }

        .aboutHeader,
        .byline,
        .aboutText,
        .footer {
            color: azure;
        }

        /* Medium devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            .slideAwal {
                display: none
            }
        }
    </style>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato);
        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);


        a {
            text-decoration: none;
            /* color: #fff; */
        }

        p>a:hover {
            color: #d9d9d9;
            text-decoration: underline;
        }


        ._12 {
            font-size: 1.2em;
        }

        /* .footer-social-icons {
            width: 100%;
            display: block;
            margin: 0 auto;
        } */

        .social-icon {
            color: #fff;
        }


        .social-icons a {
            color: #fff;
            text-decoration: none;
        }

        .fa-facebook {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #322f30;
        }

        .fa-facebook:hover {
            background-color: #3d5b99;
        }

        .fa-twitter {
            padding: 10px 12px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #322f30;
        }

        .fa-twitter:hover {
            background-color: #00aced;
        }


        .fa-youtube {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #322f30;
        }

        .fa-youtube:hover {
            background-color: #e64a41;
        }

        .fa-instagram {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #322f30;
        }

        .fa-instagram:hover {
            background-color: #0073a4;
        }

        .fa-github {
            padding: 10px 14px;
            -o-transition: .5s;
            -ms-transition: .5s;
            -moz-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s;
            background-color: #322f30;
        }

        .fa-github:hover {
            background-color: #5a32a3;
        }
    </style>
    <style>
        .map-responsive {
            overflow: hidden;
            padding-bottom: 50%;
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body>
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= base_url('assets/img/logoW.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                <b>m-Barber</b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?= base_url() ?>#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>#paket">Package</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>#service">Service</a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>#about">About</a>
                    <!-- <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>