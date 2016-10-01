<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Products" alt="Products">
            </paper-card>
        </div>
    </div>
    <div class="row item-list">
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