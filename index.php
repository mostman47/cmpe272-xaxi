<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="plugins/mindfor.affix.js"></script>
    <script src="bower_components/webcomponentsjs/webcomponents.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="import" href="bower_components/polymer/polymer.html">

    <link rel="import" href="bower_components/iron-iconset-svg/iron-iconset-svg.html">
    <link rel="import" href="bower_components/iron-icons/iron-icons.html">

    <link rel="import" href="bower_components/paper-item/paper-icon-item.html">
    <link rel="import" href="bower_components/paper-icon-button/paper-icon-button.html">
    <link rel="import" href="bower_components/paper-checkbox/paper-checkbox.html">
    <link rel="import" href="bower_components/paper-card/paper-card.html">

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
                background-image: url(assets/images/bg1.jpg);
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
            window.mindfor.Affix.defaults.marginBottom = 0;


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

<app-header-layout class="mindfor-affix-stop">

    <app-header fixed condenses effects="waterfall resize-title blend-background parallax-background">
        <app-toolbar>
            <paper-icon-button icon="menu" id="toggle"></paper-icon-button>
            <h4 condensed-title>Water of Life - XAXI</h4>
            <!--            <paper-icon-button icon="search"></paper-icon-button>-->
        </app-toolbar>
        <app-toolbar class="tall">
            <h1 main-title>Water of Life</h1>
        </app-toolbar>
    </app-header>

    <app-drawer-layout id="drawerLayout">
        <app-drawer id="Affix">
            <div class="drawer-content">
                <paper-icon-item>
                    <iron-icon icon="icons:home" item-icon></iron-icon>
                    <span>Home</span>
                </paper-icon-item>
                <paper-icon-item>
                    <iron-icon icon="query-builder" item-icon></iron-icon>
                    <span>About</span>
                </paper-icon-item>
                <paper-icon-item>
                    <iron-icon icon="done" item-icon></iron-icon>
                    <span>Products</span>
                </paper-icon-item>
                <paper-icon-item>
                    <iron-icon icon="drafts" item-icon></iron-icon>
                    <span>News</span>
                </paper-icon-item>
                <paper-icon-item>
                    <iron-icon icon="send" item-icon></iron-icon>
                    <span>Contact</span>
                </paper-icon-item>
                <paper-icon-item>
                    <iron-icon icon="delete" item-icon></iron-icon>
                    <span>Trash</span>
                </paper-icon-item>
                <paper-icon-item>
                    <iron-icon icon="report" item-icon></iron-icon>
                    <span>Spam</span>
                </paper-icon-item>
            </div>
        </app-drawer>
        <div class="container-fluid item-list">
            <div class="row">
                <?php
                for ($x = 0; $x <= 20; $x++) {
                    ?>
                    <div class="col-xs-12 col-sm-4 col-lg-3">
                        <paper-card heading="Emmental" image="assets/images/empty_can.jpg" alt="Emmental">
                            <div class="card-content">
                                Emmentaler or Emmental is a yellow, medium-hard cheese that originated in the area
                                around
                                Emmental, Switzerland. It is one of the cheeses of Switzerland, and is sometimes known
                                as
                                Swiss cheese.
                            </div>
                        </paper-card>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>

    </app-drawer-layout>

</app-header-layout>

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


</body>
</html>