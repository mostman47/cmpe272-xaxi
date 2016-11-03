<?php
print_r($_GET['id']);
if (isset($_GET['id'])) {
    $product = getProductById($_GET['id']);
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
                                        as
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
</div>