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
        $products = getAllProductExternal();
        print_r($products);
        ?>
        <?php
        $cookie = $_COOKIE['product-most'];

        if (isset($cookie)) {
            $cookie = json_decode($cookie, true);
            asort($cookie);
            $count = 0;
            $array = array();
            while ($count < 5 && count($cookie) > 0) {
                end($cookie);
                $key = key($cookie);
                array_pop($cookie);
                array_push($array, $key);
                $count++;
            }
            $products = getProductByArrayId($array);
            /**/
            $cookie = $_COOKIE['product-most'];
            $cookie = json_decode($cookie, true);
            while ($rows = mysql_fetch_assoc($products)) {

                ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                    <a href="./?page=product-item&id=<?php echo $rows['id']; ?>">

                        <paper-card image="assets/images/soda/<?php echo $rows['image']; ?>" class="small">
                            <div class="pull-left">
                                <paper-badge label="<?php
                                echo $cookie[$rows['id']];
                                ?>"></paper-badge>
                            </div>
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
        }
        ?>

    </div>
</div>