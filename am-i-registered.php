<?php include "function.php";

$database = new Db();
$events = $database->query("SELECT * FROM vf_events ORDER BY start_date ASC");

?>
<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <title>Voter Festival</title>
    <meta charset="utf-8">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="icon" href="images/favicon/favicon.ico">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:site:id" content="">
    <meta name="twitter:title" content="#">
    <meta name="twitter:description" content="#">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:creator:id" content="">

    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="#">

    <link rel="apple-touch-icon" href="#" />

    <!-- Open Graph data -->
    <meta property="og:title" content="Voter Festival" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="#" />
    <meta property="og:description" content="#" />
    <meta property="og:site_name" content="#" />

    <link rel="stylesheet" href="css/firewatchlaunch.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="css/camponav.css" type="text/css" media="screen" charset="utf-8">

    <!-- bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- H&FJ CLOUD.TYPOGRAPHY ENABLED for VERLAG -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7652892/657204/css/fonts.css" /> -->
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.css"> -->
    <link rel="stylesheet" href="css/voter_festival.css" type="text/css">
</head>

<body class="voter-festival">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/yiflogodark.png" alt="Voter Festival" width="150" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto d-flex">

                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="am-i-registered.php">Am i registered?</a>
                    </li>

                    <!--   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Am i registered?
                        </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-uppercase" href="#">Am i registered?</a></li>
                            <li><a class="dropdown-item text-uppercase" href="#">voting in my state</a></li>
                            <li><a class="dropdown-item text-uppercase" href="#">my polling place</a></li>
                            <li><a class="dropdown-item text-uppercase" href="#">faq</a></li>
                        </ul> -->
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase register" href="#myTabContent">Volunteer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase greenregister" href="#" data-bs-toggle="modal"
                            data-bs-target="#hostModal">
                            Host YIF at your event
                        </a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <div id="page">
        <div id="main-container">
            <div class="main">

                <div class="section am-i-registered text-start">
                    <div class="container">
                        <h4 class="anton">
                            Already have your EPIC? Check if you’re added to the electoral roll. Vote for your choice of
                            leaders at the next election.
                        </h4>
                        <p>Follow 5 simple steps:</p>
                        <div class="steps">
                            <div class="step step-0" id="step-0">
                                <div>
                                    <div class="circle">
                                        1
                                    </div>
                                </div>
                                <div class="step-content">
                                    <p>
                                        Go to https://electoralsearch.in/
                                    </p>
                                </div>
                            </div>
                            <div class="step step-1" id="step-1">
                                <div>
                                    <div class="circle">
                                        2
                                    </div>
                                </div>
                                <div class="step-content">
                                    <p>
                                        Click on “Search by EPIC No.”
                                    </p>
                                    <div class="step1-img">
                                        <img src="images/register/1.jpg" alt="First">
                                    </div>
                                </div>
                            </div>
                            <div class="step step-2" id="step-2">
                                <div>
                                    <div class="circle">
                                        3
                                    </div>
                                </div>
                                <div class="step-content">
                                    <p>Add your EPIC number [This is a 10 digit alphanumeric number uniquely assigned
                                        to
                                        you, you can find it on the top right hand corner of your Voter Registration
                                        Card]
                                    </p>
                                    <div class="step2-img">
                                        <img src="images/register/2.jpg" alt="Second">
                                    </div>
                                </div>
                            </div>
                            <div class="step step-3" id="step-3">
                                <div>
                                    <div class="circle">
                                        4
                                    </div>
                                </div>
                                <div class="step-content">
                                    <p>Select the state that your EPIC is last registered from [Available on the
                                        back-side
                                        of your
                                        Voter Registration Card]</p>
                                    <div class="step3-img">
                                        <img src="images/register/3.jpg" alt="Third">
                                    </div>
                                </div>
                            </div>
                            <div class="step step-4" id="step-4">
                                <div>
                                    <div class="circle">
                                        5
                                    </div>
                                </div>
                                <div class="step-content">
                                    <p>Fill the CAPTCHA and press search!</p>
                                    <div class="step4-img">
                                        <img src="images/register/4.jpg" alt="Fourth">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer start-->
                <div class="section bg-black pt-4">
                    <div class="container">
                        <div class="marginbottomspace"></div>
                        <div class="footer-logo">
                            <a href="https://youngindia.foundation/">
                                <img src="images/yiflogolight.png" alt="YIF" width="300">
                            </a>
                        </div>
                        <p class="basicblock__copy">
                            Young India Foundation is a public trust registered u/s 12A of the Income Tax Act, 1961, and
                            with the Director of Income Tax (Exemptions) u/s 80G.
                        </p>
                        <ul class="footer__stacklist">
                            <li class="menu-item">
                                <a href="https://yif.org.in/about" class="cc_sitewide_footer">Our Work</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://yif.org.in/contact-us" class="cc_sitewide_footer">Contact</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://yif.org.in/privacy-policy" class="cc_sitewide_footer">
                                    Privacy Policy
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="https://yif.org.in/terms-and-conditions" class="cc_sitewide_footer">
                                    Terms
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="https://yif.org.in/return-policy" class="cc_sitewide_footer">
                                    Return Policy
                                </a>
                            </li>
                        </ul>
                        <ul class="footer__social">
                            <li class="footer__social__item">
                                <a href="https://www.facebook.com/youngindiafdn" target="_blank">
                                    <!--?xml version="1.0" encoding="UTF-8"?-->
                                    <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <!-- Generator: Sketch 63.1 (92452) - https://sketch.com -->
                                        <title>Icon / Social / Facebook</title>
                                        <desc>Created with Sketch.</desc>
                                        <g id="2020-02-06" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Footer---Desktop" transform="translate(-560.000000, -509.000000)">
                                                <g id="Group-4" transform="translate(560.000000, 509.000000)">
                                                    <g id="Icon-/-Social-/-Facebook">
                                                        <path class="line"
                                                            d="M6.38819446,6.38819446 C2.62939815,10.1469908 0.75,15.0734954 0.75,20 C0.75,24.9265046 2.62939815,29.8530092 6.38819446,33.6118055 C10.1469908,37.3706018 15.0734954,39.25 20,39.25 C24.9265046,39.25 29.8530092,37.3706018 33.6118055,33.6118055 C37.3706018,29.8530092 39.25,24.9265046 39.25,20 C39.25,15.0734954 37.3706018,10.1469908 33.6118055,6.38819446 C29.8530092,2.62939815 24.9265046,0.75 20,0.75 C15.0734954,0.75 10.1469908,2.62939815 6.38819446,6.38819446 Z"
                                                            id="Oval" stroke-width="1.5"></path>
                                                        <path class="icon"
                                                            d="M21.1068649,27.3600008 L21.1068649,19.6791012 L23.3789059,19.6791012 L23.6800004,17.0322206 L21.1068649,17.0322206 L21.1107251,15.7074313 C21.1107251,15.0170841 21.1810127,14.6471803 22.2435288,14.6471803 L23.6639163,14.6471803 L23.6639163,12 L21.3915536,12 C18.6620806,12 17.7013769,13.2840219 17.7013769,15.4433428 L17.7013769,17.0325204 L16,17.0325204 L16,19.6794009 L17.7013769,19.6794009 L17.7013769,27.3600008 L21.1068649,27.3600008 Z"
                                                            id="Oval-1" fill-rule="nonzero"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li class="footer__social__item">
                                <a href="https://twitter.com/YoungIndiaFDN" target="_blank">
                                    <!--?xml version="1.0" encoding="UTF-8"?-->
                                    <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <!-- Generator: Sketch 63.1 (92452) - https://sketch.com -->
                                        <title>Icon / Social / Twitter</title>
                                        <desc>Created with Sketch.</desc>
                                        <g id="2020-02-06" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Footer---Desktop" transform="translate(-620.000000, -509.000000)">
                                                <g id="Group-4" transform="translate(560.000000, 509.000000)">
                                                    <g id="Icon-/-Social-/-Twitter"
                                                        transform="translate(60.000000, 0.000000)">
                                                        <g id="Group-12">
                                                            <path class="line"
                                                                d="M6.38819446,6.38819446 C2.62939815,10.1469908 0.75,15.0734954 0.75,20 C0.75,24.9265046 2.62939815,29.8530092 6.38819446,33.6118055 C10.1469908,37.3706018 15.0734954,39.25 20,39.25 C24.9265046,39.25 29.8530092,37.3706018 33.6118055,33.6118055 C37.3706018,29.8530092 39.25,24.9265046 39.25,20 C39.25,15.0734954 37.3706018,10.1469908 33.6118055,6.38819446 C29.8530092,2.62939815 24.9265046,0.75 20,0.75 C15.0734954,0.75 10.1469908,2.62939815 6.38819446,6.38819446 Z"
                                                                id="Oval" stroke-width="1.5"></path>
                                                            <path class="icon"
                                                                d="M20.2039726,16.6774007 L20.2405974,17.2753277 L19.6301828,17.2021121 C17.4082736,16.9214525 15.4671551,15.9696503 13.8190356,14.3711107 L13.0132883,13.5779423 L12.8057473,14.1636666 C12.3662488,15.469344 12.6470395,16.8482369 13.5626614,17.7756339 C14.0509931,18.2881428 13.9411185,18.3613584 13.0987463,18.0562936 C12.8057473,17.9586728 12.5493732,17.8854572 12.5249565,17.9220651 C12.4394985,18.0074832 12.7324975,19.1179191 12.9644551,19.5572124 C13.2818707,20.1673421 13.9289102,20.765269 14.6369911,21.1191442 L15.2351975,21.3998038 L14.5271165,21.4120064 C13.8434522,21.4120064 13.8190356,21.424209 13.8922854,21.6804634 C14.1364512,22.473632 15.1009063,23.3156108 16.1752361,23.6816886 L16.9321501,23.937943 L16.2729023,24.3284259 C15.296239,24.8897452 14.1486594,25.2070126 13.00108,25.2314178 C12.4517068,25.2436203 12,25.2924307 12,25.3290386 C12,25.4510644 13.4894117,26.1344096 14.3562005,26.4028666 C16.9565667,27.1960351 20.0452648,26.8543625 22.3648403,25.4998748 C24.0129598,24.53587 25.6610794,22.6200631 26.4302018,20.765269 C26.8452837,19.7768591 27.2603656,17.9708755 27.2603656,17.1044913 C27.2603656,16.5431722 27.2969905,16.4699566 27.9806548,15.798814 C28.3835285,15.408331 28.7619856,14.9812404 28.8352354,14.8592144 C28.9573183,14.6273652 28.9451101,14.6273652 28.3224871,14.8348092 C27.2847822,15.200887 27.1382827,15.1520766 27.651031,14.60296 C28.029488,14.212477 28.4811949,13.5047267 28.4811949,13.2972826 C28.4811949,13.2606748 28.2980705,13.3216878 28.0905295,13.4315111 C27.8707802,13.5535371 27.3824485,13.7365759 27.0161998,13.8463993 L26.356952,14.0538433 L25.7587456,13.6511577 C25.4291217,13.4315111 24.9652067,13.1874593 24.7210408,13.1142437 C24.0984179,12.9434074 23.1461711,12.9678126 22.5845895,13.1630541 C21.058553,13.7121708 20.0940979,15.1276715 20.2039726,16.6774007 C20.2039726,16.6774007 20.0940979,15.1276715 20.2039726,16.6774007 Z"
                                                                id="Oval-1" fill-rule="nonzero"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li class="footer__social__item">
                                <a href="https://www.instagram.com/youngindiafdn/" target="_blank">
                                    <!--?xml version="1.0" encoding="UTF-8"?-->
                                    <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <!-- Generator: Sketch 63.1 (92452) - https://sketch.com -->
                                        <title>Icon / Social / Instagram</title>
                                        <desc>Created with Sketch.</desc>
                                        <g id="2020-02-06" stroke="none" stroke-width="1" fill="none"
                                            fill-rule="evenodd">
                                            <g id="Footer---Desktop" transform="translate(-680.000000, -509.000000)">
                                                <g id="Group-4" transform="translate(560.000000, 509.000000)">
                                                    <g id="Icon-/-Social-/-Instagram"
                                                        transform="translate(120.000000, 0.000000)">
                                                        <g id="Group-16">
                                                            <path class="line"
                                                                d="M6.38819446,6.38819446 C2.62939815,10.1469908 0.75,15.0734954 0.75,20 C0.75,24.9265046 2.62939815,29.8530092 6.38819446,33.6118055 C10.1469908,37.3706018 15.0734954,39.25 20,39.25 C24.9265046,39.25 29.8530092,37.3706018 33.6118055,33.6118055 C37.3706018,29.8530092 39.25,24.9265046 39.25,20 C39.25,15.0734954 37.3706018,10.1469908 33.6118055,6.38819446 C29.8530092,2.62939815 24.9265046,0.75 20,0.75 C15.0734954,0.75 10.1469908,2.62939815 6.38819446,6.38819446 Z"
                                                                id="Oval" stroke-width="1.5"></path>
                                                            <g class="icon" id="ig-logo"
                                                                transform="translate(12.000000, 12.000000)"
                                                                fill-rule="nonzero">
                                                                <path
                                                                    d="M7.58964747,3.61411784 C5.39402309,3.61411784 3.61411784,5.39402309 3.61411784,7.58964747 C3.61411784,9.78527186 5.39402309,11.5651771 7.58964747,11.5651771 C9.78527186,11.5651771 11.5651771,9.78527186 11.5651771,7.58964747 C11.5651771,6.53527146 11.1463279,5.52407994 10.4007714,4.77852351 C9.655215,4.03296709 8.64402349,3.61411784 7.58964747,3.61411784 L7.58964747,3.61411784 Z M7.58964747,10.1719085 C6.1635041,10.1719085 5.00738646,9.01579085 5.00738646,7.58964747 C5.00738646,6.1635041 6.1635041,5.00738646 7.58964747,5.00738646 C9.01579085,5.00738646 10.1719085,6.1635041 10.1719085,7.58964747 C10.1719085,9.01579085 9.01579085,10.1719085 7.58964747,10.1719085 L7.58964747,10.1719085 Z"
                                                                    id="Shape"></path>
                                                                <circle id="Oval" cx="11.9265889" cy="3.97552963"
                                                                    r="1.08423535">
                                                                </circle>
                                                                <path
                                                                    d="M15.4825092,2.73896672 C15.069294,1.67365252 14.2256351,0.831418192 13.1585189,0.418900792 C12.5403873,0.187220204 11.8873605,0.0619200296 11.22724,0.0483347067 C10.377262,0.0107410459 10.1082817,0 7.95105926,0 C5.79383682,0 5.51947686,0 4.67487855,0.0483347067 C4.01475802,0.0619200296 3.36173121,0.187220204 2.74359961,0.418900792 C1.67648346,0.831418192 0.832824515,1.67365252 0.419609352,2.73896672 C0.187536882,3.35605453 0.0620247658,4.00797862 0.0484164637,4.66698446 C0.0107592142,5.51552709 0,5.78405324 0,7.93763295 C0,10.0912127 0,10.3651093 0.0484164637,11.2082814 C0.0620247658,11.8672873 0.187536882,12.5192114 0.419609352,13.1362992 C0.832824515,14.2016134 1.67648346,15.0438477 2.74359961,15.4563651 C3.36012369,15.6972225 4.0132008,15.8316128 4.67487855,15.8537838 C5.52485647,15.8913775 5.79383682,15.9021185 7.95105926,15.9021185 C10.1082817,15.9021185 10.3826417,15.9021185 11.22724,15.8537838 C11.8873605,15.8401985 12.5403873,15.7148983 13.1585189,15.4832177 C14.2256351,15.0707003 15.069294,14.228466 15.4825092,13.1631518 C15.7145816,12.546064 15.8400938,11.8941399 15.8537021,11.2351341 C15.8913593,10.3865914 15.9021185,10.1180653 15.9021185,7.96448557 C15.9021185,5.81090585 15.9021185,5.53700918 15.8537021,4.69383708 C15.8431495,4.0257878 15.7175885,3.36452647 15.4825092,2.73896672 L15.4825092,2.73896672 Z M14.4065877,11.1438352 C14.401981,11.6518199 14.3091519,12.155158 14.1322278,12.63147 C13.864453,13.3250715 13.3153328,13.8732644 12.6205582,14.140587 C12.1485329,14.3153909 11.6499603,14.4080342 11.1465459,14.4144837 C10.3073272,14.4520773 10.0706244,14.4628184 7.91878162,14.4628184 C5.76693879,14.4628184 5.5463749,14.4628184 4.69101737,14.4144837 C4.18760297,14.4080342 3.68903037,14.3153909 3.21700503,14.140587 C2.51981339,13.8751092 1.96835768,13.3265369 1.69995584,12.63147 C1.52485624,12.1602418 1.43205623,11.6625111 1.42559588,11.1599467 C1.38793863,10.3221451 1.37717941,10.0858421 1.37717941,7.93763295 C1.37717941,5.78942376 1.37717941,5.56923232 1.42559588,4.71531917 C1.43020265,4.2073344 1.52303175,3.70399635 1.69995584,3.22768431 C1.96835768,2.53261743 2.51981339,1.98404513 3.21700503,1.71856735 C3.68903037,1.54376343 4.18760297,1.45112012 4.69101737,1.44467068 C5.53023607,1.40707702 5.76693879,1.39633597 7.91878162,1.39633597 C10.0706244,1.39633597 10.2911883,1.39633597 11.1465459,1.44467068 C11.6499603,1.45112012 12.1485329,1.54376343 12.6205582,1.71856735 C13.3153328,1.98588992 13.864453,2.53408288 14.1322278,3.22768431 C14.3073274,3.69891258 14.4001274,4.19664327 14.4065877,4.6992076 C14.444245,5.53700918 14.4550042,5.77331219 14.4550042,7.92152138 C14.4550042,10.0697306 14.4550042,10.3006631 14.417347,11.1438352 L14.4065877,11.1438352 Z"
                                                                    id="Shape"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <div class="">
                            <div class="">
                                <a href="https://www.kwad.in/">
                                    <img src="images/kwad_logo_light.png" alt="KWAD" width="100" height="26">
                                </a>
                            </div>
                        </div>
                        <small>
                            <p class="mb-0 pb-4 text-white" style="font-size: 0.5em; margin-top: 10px;">Designed by Kwad
                            </p>
                        </small>
                    </div>
                    <div class="marginbottomspace"></div>
                </div>
                <!-- Footer End-->

            </div>
        </div>
    </div>

    <?php include "event-modal.php";?>
    <?php include "host-modal.php";?>
    <?php include "thanks-modal.php";?>
    <?php include "th-vol-modal.php";?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"
        integrity="sha256-mBCu5+bVfYzOqpYyK4jm30ZxAZRomuErKEFJFIyrwvM=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.js"></script> -->
    <script src="js/voter_festival.js"></script>
</body>

</html>