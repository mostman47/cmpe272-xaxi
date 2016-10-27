<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card id="Affix1" class="col-xs-12" heading="Users" alt="Users">
                <div class="tool-bar">
                    <paper-button id="createUserModalButton" class="pull-right blue" onclick="createUserModal.open();"
                                  raised>
                        <iron-icon icon="icons:add"></iron-icon>
                        Add User
                    </paper-button>
                </div>
                <paper-dropdown-menu label="Search by" id="searchBy">
                    <paper-listbox class="dropdown-content" selected="0">
                        <paper-item>names</paper-item>
                        <paper-item>email</paper-item>
                        <paper-item>phone numbers</paper-item>
                    </paper-listbox>
                </paper-dropdown-menu>
                <paper-input label="Enter search text ... and click search icon" id="searchInput">
                    <paper-icon-button suffix onclick="clearSearch()" icon="clear" alt="clear" title="clear">
                    </paper-icon-button>
                    <paper-icon-button suffix onclick="searchUserForm()" icon="icons:search" alt="search"
                                       title="search">
                    </paper-icon-button>
                </paper-input>
            </paper-card>
        </div>
        <div class="col-xs-12 users-list">
            <br>

            <?php
            if (isset($_GET['searchType']) && isset($_GET['searchValue'])) {
                $type = $_GET['searchType'];
                $value = $_GET['searchValue'];
                $users = searchUser($type, $value);
            } else {
                $users = getAllUser();
            }

            while ($rows = mysql_fetch_assoc($users)) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <paper-card heading="
            <?php echo $rows['first_name'] . ' ' . $rows['last_name']; ?>">
                        <ul class="">
                            <?php
                            foreach ($rows as $key => $value) {
                                ?>

                                <li>
                                                <span>
                                        <?php
                                        echo $key . ' : ' . $value;
                                        ?>
                                    </span></li>
                            <?php } ?>
                        </ul>
                    </paper-card>
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


        $(document).ready(function () {
            var parameters = getUrlParameter();
            console.log(parameters);

            setTimeout(function () {
                if (parameters.searchType) {
                    $("#searchBy input")[0].value = parameters.searchType;
                    document.getElementById('searchInput').value = parameters.searchValue;
                }
            }, 1000);
        });

        var searchUserForm = function () {
            var type = document.getElementById('searchBy').value;
            var text = document.getElementById('searchInput').value;
            var search = "?page=users";
            if (text) {
                search += "&searchType=" + type;
                search += "&searchValue=" + text;
                window.location.search = search;
            }
        };

        var clearSearch = function () {
            var parameters = getUrlParameter();

            document.getElementById('searchInput').value = '';
            if (parameters.searchType) {
                window.location.search = "?page=users";
            }
        };
    </script>
</div>