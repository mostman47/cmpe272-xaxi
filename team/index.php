<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="plugins/mindfor.affix.js"></script>
    <script src="bower_components/mustache.js/mustache.js"></script>
    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">


    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="bower_components/iron-iconset-svg/iron-iconset-svg.html">
    <link rel="import" href="bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="bower_components/iron-icons/communication-icons.html">
    <link rel="import" href="bower_components/iron-icons/social-icons.html">
    <link rel="import" href="bower_components/iron-icons/hardware-icons.html">
    <link rel="import" href="bower_components/iron-icons/maps-icons.html">
    <link rel="import" href="bower_components/iron-form/iron-form.html">
    <link rel="import" href="bower_components/iron-flex-layout/iron-flex-layout.html">

    <link rel="import" href="bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import" href="bower_components/paper-listbox/paper-listbox.html">
    <link rel="import" href="bower_components/paper-item/paper-item.html">
    <link rel="import" href="bower_components/paper-item/paper-icon-item.html">
    <link rel="import" href="bower_components/paper-menu/paper-menu.html">
    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="bower_components/paper-card/paper-card.html">
    <link rel="import" href="bower_components/paper-dialog/paper-dialog.html">
    <link rel="import" href="bower_components/paper-button/paper-button.html">
    <link rel="import" href="bower_components/paper-input/paper-input.html">
    <link rel="import" href="bower_components/paper-input/paper-textarea.html">
    <link rel="import" href="bower_components/paper-spinner/paper-spinner.html">
    <link rel="import" href="bower_components/paper-styles/color.html">
    <link rel="import" href="bower_components/paper-fab/paper-fab.html">
    <link rel="import" href="bower_components/paper-badge/paper-badge.html">

    <link rel="import" href="bower_components/app-layout/app-drawer-layout/app-drawer-layout.html">
    <link rel="import" href="bower_components/app-layout/app-drawer/app-drawer.html">
    <link rel="import" href="bower_components/app-layout/app-header-layout/app-header-layout.html">
    <link rel="import" href="bower_components/app-layout/app-header/app-header.html">
    <link rel="import" href="bower_components/app-layout/app-scroll-effects/app-scroll-effects.html">
    <link rel="import" href="bower_components/app-layout/app-toolbar/app-toolbar.html">


    <link rel="import" href="bower_components/app-layout/demo/sample-content.html">
    <link rel="stylesheet" href="style/style.css">
    <style is="custom-style">

        app-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 212px;
            color: #fff;
            background-color: #3f51b5;
            --app-header-background-front-layer: {
                background-image: url(https://si.wsj.net/public/resources/images/BN-QI711_consum_GR_20161019084228.jpg);
                background-position: left center;
            };
        }

        paper-icon-button {
            --paper-icon-button-ink-color: white;
        }

        app-toolbar.tall {
            height: 148px;
        }

        @media (max-width: 639px) {
            [main-title] {
                margin-left: 50px;
                font-size: 30px;
            }

            [condensed-title] {
                font-size: 15px;
            }
        }

    </style>

    <script type="text/javascript">
        $(document).ready(function ($) {
            "use strict";

            var affixEnabled = false;
            window.mindfor.Affix.defaults.marginTop = 70;
            window.mindfor.Affix.defaults.marginBottom = 50;


            function affixUpdate() {
                var width = $(window).width();
                if (!affixEnabled && width > 992) {
                    $("#Affix").mindforAffix();
                    affixEnabled = true;
                }
                else if (affixEnabled && width <= 992) {
                    var affix = $("#Affix").mindforAffix();
                    if (affix)
                        affix.remove();
                    affixEnabled = false;
                }

            }

            $(window).resize(affixUpdate);
            $(window).one("scroll", function () {
                console.log("scroll");
                affixUpdate();
            });

        });
    </script>
</head>
<body class="fullbleed main" unresolved>

<?php
include 'service/mysql.php';

?>

<?php
$page = "";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
?>
<app-header-layout class="mindfor-affix-stop">

    <app-header fixed condenses effects="waterfall resize-title blend-background parallax-background">
        <app-toolbar>
            <paper-icon-button icon="menu" id="toggle"></paper-icon-button>
            <h4 condensed-title>Multi-Product Market</h4>
            <!--            <paper-icon-button icon="search"></paper-icon-button>-->

            <paper-button class="green" is-login="false" raised onclick="signUpModal.open();">
                <paper-icon-button icon="icons:assignment-ind"></paper-icon-button>
                Sign Up
            </paper-button>
            <paper-button class="green" is-login="false" raised onclick="loginModal.open();">
                <paper-icon-button icon="icons:account-circle"></paper-icon-button>
                Login
            </paper-button>
            <paper-menu-button is-login="true">
                <paper-icon-button icon="icons:account-circle" class="dropdown-trigger"></paper-icon-button>
                <paper-menu class="dropdown-content">
                    <paper-item onclick="logout()"><a href="javascript:void(0)">Logout</a></paper-item>
                </paper-menu>
            </paper-menu-button>
            <small is-login="true">Hi, <span id="userName">Nam</span></small>
        </app-toolbar>
        <app-toolbar class="tall">
            <h1 main-title>Multi-Product</h1>
        </app-toolbar>
    </app-header>

    <app-drawer-layout id="drawerLayout">
        <app-drawer id="Affix">
            <div class="drawer-content">
                <a href=".">
                    <paper-icon-item
                        class="<?php
                        if ($page === "") {
                            echo "iron-selected";
                        }
                        ?>"
                    >
                        <iron-icon icon="icons:home" item-icon></iron-icon>
                        <span>Home</span>
                        <paper-ripple></paper-ripple>
                    </paper-icon-item>
                </a>
                <a href="./?page=product">
                    <paper-icon-item
                        class="<?php
                        if ($page === "product" || $page === "product-item" || $page === "product-most" || $page === "product-previous") {
                            echo "iron-selected";
                        }
                        ?>"
                    >
                        <iron-icon icon="maps:local-pizza" item-icon></iron-icon>
                        <span>Products</span>
                        <paper-ripple></paper-ripple>
                    </paper-icon-item>
                </a>
                <a href="./?page=topFive">
                    <paper-icon-item
                        class="<?php
                        if ($page === "topFive") {
                            echo "iron-selected";
                        }
                        ?>"
                    >
                        <iron-icon icon="icons:stars" item-icon></iron-icon>
                        <span>Top Five</span>
                        <paper-ripple></paper-ripple>
                    </paper-icon-item>
                </a>
                <a href="./?page=about">
                    <paper-icon-item
                        class="<?php
                        if ($page === "about") {
                            echo "iron-selected";
                        }
                        ?>"
                    >
                        <iron-icon icon="icons:font-download" item-icon></iron-icon>
                        <span>About</span>
                        <paper-ripple></paper-ripple>
                    </paper-icon-item>
                </a>

                <a href="./?page=contact">
                    <paper-icon-item
                        class="<?php
                        if ($page === "contact") {
                            echo "iron-selected";
                        }
                        ?>"
                    >
                        <iron-icon icon="communication:contact-mail" item-icon></iron-icon>
                        <span>Contact</span>
                        <paper-ripple></paper-ripple>
                    </paper-icon-item>
                </a>

            </div>
        </app-drawer>


        <?php
        if ($page !== "") {
            switch ($page) {
                case 'about':
                    include 'views/about.php';
                    break;
                case 'product':
                    include 'views/product.php';
                    break;
                case 'product-item':
                    include 'views/product.item.php';
                    break;
                case 'contact':
                    include 'views/contact.php';
                    break;
                case 'reference':
                    include 'views/reference.php';
                    break;
                case 'topFive':
                    include 'views/topFive.php';
                    break;
            }
        } else {
            include 'views/home.php';
        }
        ?>

    </app-drawer-layout>

</app-header-layout>

<?php
include 'views/loginModal.php';
include 'views/signUpModal.php';
?>

<script>
    var drawerLayout = document.getElementById('drawerLayout');
    document.getElementById('toggle').addEventListener('tap', function () {
        if (drawerLayout.forceNarrow || !drawerLayout.narrow) {
            drawerLayout.forceNarrow = !drawerLayout.forceNarrow;
        } else {
            drawerLayout.drawer.toggle();
        }
    });
</script>


<footer class="footer">
    <div class="container text-center">
        <ul class="list-inline">
            <li><a href="./?page=reference">Reference</a></li>
            <li>&#9829;</li>
            <li>&copy;Nam Phan. CMPE 272 - SJSU. Education purpose only.</li>
        </ul>
    </div>
</footer>

<script src="script/main.js"></script>
</body>
</html>