<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Contact" alt="Contact">
                <div class="card-content">
                    <?php
                    $string = file_get_contents("assets/contact.json");
                    $json = json_decode($string, true);
                    print '<dl class="dl-horizontal">';
                    foreach ($json as $key => $value) {
                        echo '<dt>' . $key . '</dt>';
                        echo '<dd>' . $value . '</dd>';
                    }
                    print '</dl>';

                    ?>
                </div>
            </paper-card>
        </div>
    </div>
</div>