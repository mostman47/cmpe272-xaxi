<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="News" alt="News">
            </paper-card>
        </div>
    </div>
    <div class="row item-list">
        <?php
        for ($x = 0; $x <= 11; $x++) {
            ?>
            <div class="col-xs-12 col-sm-4 col-lg-3">
                <paper-card heading="Month <?php echo $x + 1;?>" image="assets/images/news.gif" alt="Month <?php echo $x + 1;?>">
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