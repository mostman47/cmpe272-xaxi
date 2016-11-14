<?php
print_r($_GET['id']);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = getProductById($id);
//    add cookie previous
    $cookie = $_COOKIE['product-previous'];
    if (isset($cookie)) {
        $cookie = json_decode($cookie, true);
        $key = array_search($id, $cookie);
        if (false !== $key) {
        } else {
            while (count($cookie) > 4) {
                array_shift($cookie);
            }
            array_push($cookie, $id);
            setcookie('product-previous', json_encode($cookie));
        }
    } else {
        setcookie('product-previous', json_encode(array($id)));
    }
    //    add cookie most
    $most = $_COOKIE['product-most'];
    print_r($most);
    if (isset($most)) {
        $most = json_decode($most, true);
        if (array_key_exists($id, $most)) {
            $most[$id] = $most[$id] + 1;
            setcookie('product-most', json_encode($most));
        } else {
            $most[$id] = 1;
            setcookie('product-most', json_encode($most));
        }
    } else {
        setcookie('product-most', json_encode(array($id => 1)));
    }
} else {
    $product = null;
}
$product = mysql_fetch_assoc($product);
print_r($product);

?>
<div class="container-fluid product-wrapper">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="<?php echo $product['name']; ?>"
                        alt="<?php echo $product['name']; ?>">
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                            <div>
                                <ul class="list-inline">
                                    <li><a href="">
                                            <iron-icon icon="icons:star-border" item-icon></iron-icon>
                                        </a></li>
                                    <li><a href="">
                                            <iron-icon icon="icons:star-border" item-icon></iron-icon>
                                        </a></li>
                                    <li><a href="">
                                            <iron-icon icon="icons:star-border" item-icon></iron-icon>
                                        </a></li>
                                    <li><a href="">
                                            <iron-icon icon="icons:star-border" item-icon></iron-icon>
                                        </a></li>
                                    <li><a href="">
                                            <iron-icon icon="icons:star-border" item-icon></iron-icon>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="text-center">
                                <img src="assets/images/soda/<?php echo $product['image']; ?>" alt="">
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
                                            &nbsp;
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
                        <div class="col-xs-12 col-md-6">
                            <div class="about-item-complete js-slide-panel-content hide-content display-block-m"><h2
                                    class="heading-a"> About this item </h2>
                                <section class="product-about js-about-item">
                                    <section class="js-legal-badges legal-badges">
                                        <div class="js-idml-badge idml-badge Grid"></div>
                                    </section>
                                    <div class="js-ellipsis module" data-max-height="350"><p
                                            class="product-description-disclaimer"><b>Important Made in USA Origin
                                                Disclaimer:</b> For certain items sold by Walmart on Walmart.com, the
                                            displayed country of origin
                                            information may not be accurate or consistent with manufacturer information.
                                            For updated, accurate country of origin data, it is
                                            recommended that you rely on product packaging or manufacturer information.
                                        </p>
                                        <p>Relax and soak up the taste of the sun with Sunkist Soda. Sunkist Soda beams
                                            with bold, sweet orange flavor and refreshes the moment you taste it. Enjoy
                                            Sunkist Soda anytime or mix with ice cream for delicious orange floats. Gear
                                            up for good times with the bright taste of Sunkist Soda. SUNKIST is a
                                            registered trademark of Sunkist Growers, Inc., USA used under license by Dr
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
                                            <p><b>Ingredients:</b> Carbonated Water, High Fructose Corn Syrup, Citric
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
                            <img src="assets/images/Nutrition.PNG" alt="">
                        </div>
                    </div>
                </div>
            </paper-card>
        </div>
    </div>
</div>