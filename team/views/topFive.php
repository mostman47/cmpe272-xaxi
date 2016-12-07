<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Top Five" alt="Top Five">
                <div class="tool-bar">
                    <!--                    <paper-button id="createUserModalButton" class="pull-right blue" onclick="createUserModal.open();"-->
                    <!--                                  raised>-->
                    <!--                        <iron-icon icon="icons:add"></iron-icon>-->
                    <!--                        Add User-->
                    <!--                    </paper-button>-->
                    <paper-dropdown-menu label="Filter by" id="searchBy">
                        <paper-listbox class="dropdown-content" selected="0">
                            <paper-item>Top five most visited</paper-item>
                            <paper-item>Top five best review</paper-item>
                        </paper-listbox>
                    </paper-dropdown-menu>
                </div>

            </paper-card>
        </div>
    </div>
    <div class="row item-list">
        <?php
        $array = array();
        $products = getAllProductExternal();

        $visits = getAllVisit(5);
        while ($visit = mysql_fetch_assoc($visits)) {
            foreach ($products as $product) {
                if ($product['id'] == $visit['product_id']) {
                    $product['count'] = $visit['count'];
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

                    <paper-card image="<?php echo $product['image']; ?>" class="small">
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
</div>