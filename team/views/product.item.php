<?php
print_r($_GET['id']);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = searchProductItem($id);
    updateVisit($id);
} else {
    $product = null;
}

function searchProductItem($id)
{
    $products = getAllProductExternal();
    foreach ($products as $rows) {
        if ($rows['id'] == $id) {
            return $rows;
        }
    }
}

function updateVisit($id)
{
    $visit = updateVisitSQL($id);
    print_r(mysql_fetch_assoc($visit));
}

$avgRate = mysql_fetch_assoc(getRateAVG($product['id']));
?>
<div class="container-fluid product-wrapper">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="<?php echo $product['name']; ?>"
                        alt="<?php echo $product['name']; ?>">
                <div class="tool-bar">
                    <a href="./?page=product">
                        <paper-button class="pull-right blue"
                                      raised>
                            <iron-icon icon="icons:chevron-left"></iron-icon>
                            Back
                        </paper-button>
                    </a>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div>
                                <ul class="list-inline rate-group">
                                    <?php

                                    if ($avgRate['count(rate)'] > 0) {
                                        for ($i = 1; $i < 6; $i++) {
                                            ?>
                                            <li>
                                                <i class="fa star <?php if ($avgRate['avg(rate)'] >= $i) echo "active"; ?>"
                                                   aria-hidden="true"></i></li>
                                        <?php }
                                        echo round($avgRate['avg(rate)'],2) . " (" . $avgRate['count(rate)'] . " reviews)";
                                    } ?>
                                </ul>
                            </div>
                            <div class="text-center">
                                <img src="<?php echo $product['image']; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>
                                        <h3>$<?php echo $product['price']; ?>
                                            <small> + free shipping</small>
                                        </h3>
                                        <br>
                                        <paper-button class="blue"
                                                      raised>
                                            <iron-icon icon="icons:add-shopping-cart"></iron-icon>
                                            Add to Cart
                                        </paper-button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </paper-card>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12">
                <div class="card-content">
                    <div class="row">
                        <?php
                        if (is_null($product['description'])) {
                            ?>
                            <div class="col-xs-12 col-md-6">
                                <div class="about-item-complete js-slide-panel-content hide-content display-block-m"><h2
                                        class="heading-a"> About this item </h2>

                                    <section class="product-about js-about-item">
                                        <section class="js-legal-badges legal-badges">
                                            <div class="js-idml-badge idml-badge Grid"></div>
                                        </section>
                                        <div class="js-ellipsis module" data-max-height="350"><p
                                                class="product-description-disclaimer"><b>Important Made in USA Origin
                                                    Disclaimer:</b> For certain items sold by Walmart on Walmart.com,
                                                the
                                                displayed country of origin
                                                information may not be accurate or consistent with manufacturer
                                                information.
                                                For updated, accurate country of origin data, it is
                                                recommended that you rely on product packaging or manufacturer
                                                information.
                                            </p>
                                            <p>Relax and soak up the taste of the sun with Sunkist Soda. Sunkist Soda
                                                beams
                                                with bold, sweet orange flavor and refreshes the moment you taste it.
                                                Enjoy
                                                Sunkist Soda anytime or mix with ice cream for delicious orange floats.
                                                Gear
                                                up for good times with the bright taste of Sunkist Soda. SUNKIST is a
                                                registered trademark of Sunkist Growers, Inc., USA used under license by
                                                Dr
                                                Pepper/Seven Up, Inc. 2015 Sunkist Growers, Inc. and Dr Pepper/Seven Up,
                                                Inc.</p>
                                            <p></p>
                                            <li>Bold, tangy orange taste</li>
                                            <li>Enjoy Sunkist Soda anytime or mix with ice cream for delicious orange
                                                floats
                                            </li>
                                            <p></p>
                                            <section class="product-about js-ingredients health-about"><h3><strong>Ingredients:&nbsp;</strong>
                                                </h3>
                                                <p><b>Ingredients:</b> Carbonated Water, High Fructose Corn Syrup,
                                                    Citric
                                                    Acid, Sodium Benzoate (Preservative), Modified Food Starch, Natural
                                                    Flavors, Caffeine, Ester Gum, Yellow 6, Red 40. </p></section>
                                        </div>
                                        <section class="js-legal-badges legal-badges">
                                            <div class="spacer"></div>
                                            <div class="js-idml-badge idml-badge Grid"></div>
                                        </section>
                                    </section>

                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <br><br><br>
                                <img src="assets/images/Nutrition.PNG" class="img-responsive" style="margin: auto"
                                     alt="">
                            </div>
                        <?php } else {
                            ?>
                            <div class="col-xs-12 col-md-6">
                                <div class="about-item-complete js-slide-panel-content hide-content display-block-m"><h2
                                        class="heading-a"> About this item </h2>
                                    <section class="product-about js-about-item">
                                        <?php echo $product['description']; ?>
                                    </section>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </paper-card>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Add new comment" alt="Add new comment">
                <div class="tool-bar" is-login="false">
                    <ul class="list-inline">
                        <li>Login before make a comment</li>
                        <li>
                            <paper-button class="green"
                                          style="padding: 15px 15px 15px 5px;height: 50px;" raised
                                          onclick="loginModal.open();">
                                <paper-icon-button icon="icons:account-circle"></paper-icon-button>
                                Login
                            </paper-button>
                        </li>
                    </ul>
                </div>
                <div class="card-content" is-login="true">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-center">
                                <ul class="list-inline rate-group editable">
                                    <?php
                                    for ($i = 1; $i < 6; $i++) {
                                        ?>
                                        <li><a href="javascript:void(0)" onclick="setRate(<?php echo $i; ?>)">
                                                <i class="fa star" aria-hidden="true"></i>
                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div>
                                <paper-textarea id="reviewTextarea" label="Enter text"></paper-textarea>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <paper-button class="pull-right blue"
                                          onclick="createReview('<?php echo $product['id'] ?>')"
                                          raised>
                                Submit
                            </paper-button>
                        </div>
                    </div>
                </div>
            </paper-card>
        </div>
    </div>
    <br>
    <div class="row review-group">
        <?php
        $visits = searchReviewByProduct($product['id']);
        while ($visit = mysql_fetch_assoc($visits)) {
//                print_r($visit);
            $user = mysql_fetch_assoc(searchUserById($visit['user_id']));
//                print_r($user);
            ?>

            <div class="col-xs-6">
                <paper-card class="col-xs-12" heading="by <?php echo $user['username']; ?>"
                            alt="by <?php echo $user['username']; ?>">
                    <div class="tool-bar">
                        <br>
                        <ul class="list-inline rate-group">
                            <?php
                            for ($i = 1; $i < $visit['rate'] + 1; $i++) {
                                ?>
                                <li><a href="javascript:void(0)" onclick="setRate(<?php echo $i; ?>)">
                                        <i class="fa star active" aria-hidden="true"></i>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-xs-12">
                                <p>
                                    <?php print_r($visit['text']); ?>
                                </p>
                                <small class=""><?php print_r($visit['date_time']); ?></small>
                            </div>
                        </div>
                    </div>
                </paper-card>
            </div>

            <?php
        }
        ?>
    </div>
</div>

<script>
    var rateCount = 0;
    function setRate(count) {
        rateCount = count;
        console.log($(".rate-group.editable"));
        for (var i = 0; i < $(".rate-group.editable > li").length; i++) {
            if (i < count) {
                $(".rate-group.editable > li .star").eq(i).addClass("active");
            } else {
                $(".rate-group.editable > li .star").eq(i).removeClass("active");
            }

        }
    }

    function urlCreateReview(data) {
        console.log(data);
        return $.post("service/create_review.php", data).then(function (rs1) {
            console.log(rs1);
            return JSON.parse(rs1);
        });
    }

    function createReview(prod_id) {
        console.log(prod_id);
        urlCreateReview({
            text: $("#reviewTextarea").val(),
            product_id: prod_id,
            user_id: loginJson.id,
            rate: rateCount,
            date_time: new Date().toLocaleString()
        }).then(function () {
            window.location.reload();
        });
    }

</script>