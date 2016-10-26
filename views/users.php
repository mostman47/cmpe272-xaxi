<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Users" alt="Users">
            </paper-card>
        </div>
        <div class="col-xs-12 users-list">
            <br>

            <?php
            $users = getAllUser();
            while ($rows = mysql_fetch_assoc($users)) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <paper-card heading="<?php echo $rows['first_name'].' '.$rows['last_name'];?>">
                        <div class="card-actions">
                            <?php
                            foreach ($rows as $key => $value) {
                                ?>

                                <div>
                                    <paper-icon-button icon="icons:chevron-right"></paper-icon-button>
                                    <span>
                            <?php
                            echo $key . ' : ' . $value;
                            ?>
                        </span></div>
                            <?php } ?>
                        </div>
                    </paper-card>
                </div>
                <?php

            }
            ?>


        </div>
    </div>
</div>