<!DOCTYPE HTML>
<html class="scrollbar-deep-purple thin square">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Santa Ana Norte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <link href="{{ asset('images/LOGO_2_-_copia.png') }}" rel='shortcut icon' type='image/png'>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('flaticon/font/flaticon.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/frontend.css') }}" type="text/css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="{{asset('fonts/icomoon/icomoon.ttf')}}"> -->

    <link href="{{ asset('plugins/animaciones/animaciones.css') }}" type="text/css" rel="stylesheet" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>



    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}" type="text/javascript"></script>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>


    @yield('header')
    <style>
        /* On screens that are 768px or less, set the logo bigger */
        @media screen and (max-width: 768px) {
            .logoimage {
                width: 170px;
                height: 50px;
                margin-bottom: -5px;
            }
        }
        /* Para scroll */
        .scrollbar-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F2F2F2;
            border-radius: 10px; }

        .scrollbar-deep-purple::-webkit-scrollbar {
            width: 12px;
            background-color: #F2F2F2; }

        .scrollbar-deep-purple::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #213F59; }

        .square::-webkit-scrollbar-track {
            border-radius: 0 !important; }

        .square::-webkit-scrollbar-thumb {
            border-radius: 0 !important; }

        .thin::-webkit-scrollbar {
            width: 6px; }
        #soc {
            border-radius: 5px;
            border: 1px solid rgb(238,238,238);
            padding: 7px;
            width: 125px;
            color:rgb(238,238,238);
            font-size:1.5em;
        }
        #soc .p {color:rgb(238,238,238);
            font-size:1.5em;}
        #soc:hover {
            background-color:rgb(238,238,238);
            color:#10ACFA;
        }
        @media screen and (max-width: 768px) {
            #socno { display:none; }}
    </style>
</head>
