<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <paper-card class="col-xs-12" heading="Secure" alt="Secure">
                <div class="card-content">
                    <paper-button id="loginButton" raised onclick="loginModal.open();">Login</paper-button>
                </div>
            </paper-card>
            <paper-card class="col-xs-12" >
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4>User List</h4>
                            <ul id="user-list">
                            </ul>
                        </div>
                    </div>
                </div>
            </paper-card>
        </div>
    </div>
</div>

<script>
    setTimeout(function () {
        loginModal.open();
    }, 1000);

</script>