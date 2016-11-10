<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Users from other sites" alt="Users from other sites">
                <div class="card-content">
                    <p>Users from <a href="http://konstella.me/access.php">http://konstella.me/access.php</a></p>
                    <?php
                    $ch = curl_init();

                    curl_setopt_array($ch, array(
                        CURLOPT_URL => 'http://konstella.me/access.php',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_FOLLOWLOCATION => true
                    ));

                    $output = curl_exec($ch);
                    //                    echo $output;
                    $output = json_decode($output);
                    //                    print_r($output);
                    //                    foreach ($output[0] as $key => $value) {
                    //                        print_r($key);
                    //                    }

                    ?>
                    <table class="table table-bordered">
                        <thead>
                        <?php
                        foreach ($output[0] as $key => $value) {
                            ?>
                            <th>
                                <?php
                                echo $key;
                                ?>
                            </th>
                            <?php
                        }
                        ?>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($output as $row) {

                            ?>
                            <tr>
                                <?php
                                foreach ($row as $key => $value) {
                                    ?>
                                    <td><?php
                                        echo $value;
                                        ?></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </paper-card>
        </div>
    </div>
</div>