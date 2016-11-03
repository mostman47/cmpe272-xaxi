<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Products" alt="Products">
            </paper-card>
        </div>
    </div>
    <div class="row item-list">
        <?php
        $products = getAllProduct();

        while ($rows = mysql_fetch_assoc($products)) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./?page=product-item&id=<?php echo $rows['id']; ?>">
                    <paper-card image="assets/images/soda/<?php echo $rows['image']; ?>" class="small">
                        <div class="card-content">
                            <div class="title"><h4><?php echo $rows['name']; ?></h4>
                                <small class="price">$<?php echo $rows['price']; ?></small>
                            </div>
                            <?php echo $rows['description']; ?>
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