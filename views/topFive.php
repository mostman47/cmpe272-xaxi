<?php
$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_URL => 'http://myxaxi.net/team/service/export_visit.php?site=xaxi',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_FOLLOWLOCATION => true
));

$visits = curl_exec($ch);
$visits = json_decode($visits);

curl_setopt_array($ch, array(
    CURLOPT_URL => 'http://myxaxi.net/team/service/export_review.php?site=xaxi',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_FOLLOWLOCATION => true
));

$reviews = curl_exec($ch);
$reviews = json_decode($reviews);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Top Five Visited Products" alt="Top Five Visited Products">
            </paper-card>
        </div>
    </div>
    <div class="row item-list">
        <?php
        $array = array();
        $arrayVisit = array();
        $products = getAllProduct();


        foreach ($visits as $visit) {
            $arr = array();
            foreach ($visit as $key => $value) {
                $arr[$key] = $value;
            }
            array_push($arrayVisit, $arr);
        }

        while ($product = mysql_fetch_assoc($products)) {
            foreach ($arrayVisit as $visit) {
                if ($product['id'] == $visit['product_id']) {
                    $product['count'] = $visit['count'];
                    array_push($array, $product);
                }
            }
        }

        //        print_r($array);

        ?>
        <?php
        foreach ($array as $product) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                <a href="./?page=product-item&id=<?php echo $product['id']; ?>">

                    <paper-card image="assets/images/soda/<?php echo $product['image']; ?>" class="small">
                        <div class="pull-left">
                            <paper-badge label="<?php
                            echo $product['count'];
                            ?>"></paper-badge>
                        </div>
                        <div class="card-content">

                            <div class="title"><h4><?php echo $product['name']; ?></h4>
                                <small class="price">$<?php echo $product['price']; ?></small>

                            </div>
                            <?php echo $product['description']; ?>
                            <p>
                                The bold, refreshing, robust cola
                                Very low sodium
                                Gluten free; fat free
                            </p>
                        </div>
                    </paper-card>
                </a>
            </div>
            <?php

        }
        ?>

    </div>
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Top Five Rated Products" alt="Top Five Rated Products">
            </paper-card>
        </div>
    </div>
    <div class="row item-list">
        <?php

        $array = array();
        $arrayVisit = array();
        $products = getAllProduct();


        foreach ($reviews as $visit) {
            $arr = array();
            foreach ($visit as $key => $value) {
                $arr[$key] = $value;
            }
            array_push($arrayVisit, $arr);
        }

        while ($product = mysql_fetch_assoc($products)) {
            foreach ($arrayVisit as $visit) {
                if ($product['id'] == $visit['product_id']) {
                    $product['avg(rate)'] = $visit['avg(rate)'];
                    array_push($array, $product);
                }
            }
        }
        ?>
        <?php
        foreach ($array as $product) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                <a href="./?page=product-item&id=<?php echo $product['id']; ?>">

                    <paper-card image="assets/images/soda/<?php echo $product['image']; ?>" class="small">
                        <div class="text-center" style="
    position: absolute;
    width: 100%;
">
                            <ul class="list-inline rate-group">
                                <?php
                                for ($i = 1; $i < 6; $i++) {
                                    ?>
                                    <li>
                                        <i class="fa star  <?php if ($product['avg(rate)'] >= $i) echo "active"; ?>"
                                           aria-hidden="true"></i></li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                        <div class="card-content">

                            <div class="title"><h4><?php echo $product['name']; ?></h4>
                                <small class="price">$<?php echo $product['price']; ?></small>

                            </div>
                            <?php echo $product['description']; ?>
                            <p>
                                The bold, refreshing, robust cola
                                Very low sodium
                                Gluten free; fat free
                            </p>
                        </div>
                    </paper-card>
                </a>
            </div>
            <?php

        }
        ?>

    </div>
</div>
