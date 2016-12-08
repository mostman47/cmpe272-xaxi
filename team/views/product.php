<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Products" alt="Products">
                <paper-input label="Enter search text ... and click search icon" id="searchInput">
                    <paper-icon-button suffix onclick="clearSearch()" icon="clear" alt="clear" title="clear">
                    </paper-icon-button>
                    <paper-icon-button suffix onclick="searchUserForm()" icon="icons:search" alt="search"
                                       title="search">
                    </paper-icon-button>
                </paper-input>
            </paper-card>
        </div>
    </div>
    <div class="row item-list">
        <?php
        $products = getAllProductExternal($_GET['searchValue']);
        foreach ($products as $rows) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a href="./?page=product-item&id=<?php echo $rows['id']; ?>">
                    <paper-card image="<?php echo $rows['image']; ?>" class="small">
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
<script>
    function getUrlParameter() {
        // This function is anonymous, is executed immediately and
        // the return value is assigned to QueryString!
        var query_string = {};
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = decodeURIComponent(pair[1]);
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(decodeURIComponent(pair[1]));
            }
        }
        return query_string;
    }

    var searchUserForm = function () {
        var text = document.getElementById('searchInput').value;
        var search = "?page=product";
        if (text) {
            search += "&searchValue=" + text;
            window.location.search = search;
        }
    };

    var clearSearch = function () {
        var parameters = getUrlParameter();

        document.getElementById('searchInput').value = '';
        if (parameters.searchValue) {
            window.location.search = "?page=product";
        }
    };

    $(document).ready(function () {
        var parameters = getUrlParameter();
        console.log(parameters);

        setTimeout(function () {
            if (parameters.searchValue) {
                document.getElementById('searchInput').value = parameters.searchValue;
            }
        }, 1000);
    });
</script>