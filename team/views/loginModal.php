<paper-dialog id="loginModal" modal>
    <form id="loginForm" is="iron-form" action="service/login.php" method="post"
          on-iron-form-response="_onResponseRetrieved">
        <paper-icon-button icon="icons:close" class="pull-right close" dialog-dismiss></paper-icon-button>
        <h2>Login</h2>
        <paper-input label="username" name="username" required></paper-input>
        <paper-input label="password" name="password" type="password" required></paper-input>
        <br>
        <div class="buttons">

            <paper-button dialog-dismiss onclick="loginFn._reset(event)">Cancel</paper-button>
            <paper-button class="blue" raised autofocus onclick="loginFn._submit(event)">
                <paper-spinner id="loginSpinner" hidden></paper-spinner>
                Login
            </paper-button>
        </div>
        <paper-dialog id="innerDialog">
            <h2 id="login-status" class="text-center text-warning"></h2>
            <p id="login-message"></p>
            <div class="buttons">
                <paper-button dialog-dismiss onclick="loginFn._closeInner(event)">Ok</paper-button>
            </div>
        </paper-dialog>
    </form>
    <script>
        var loginEvent;
        var loginFn = {
            _submit: function (event) {
                if (loginForm.validate()) {
                    loginSpinner.active = true;
                    loginSpinner.hidden = false;
                    // Simulate a slow server response.
                    setTimeout(function () {
                        Polymer.dom(event).localTarget.parentElement.parentElement.submit();
                    }, 1000);
                }
            },
            _reset: function (event) {
                loginSpinner.hidden = true;
                var form = Polymer.dom(event).localTarget.parentElement.parentElement;
                form.reset();
            },
            _closeInner: function (event) {
                console.log(loginModal);
                if (loginEvent.detail.response && loginEvent.detail.response.status) {
                    loginModal.close();
                }
            }
        };

        document.getElementById('loginForm').addEventListener('iron-form-response', function (event) {
            loginSpinner.hidden = true;
            console.log(event);
            console.log(event.detail.response);
            loginEvent = event;
            if (event.detail.response) {
                if (event.detail.response.status) {
                    window.localStorage.setItem('loginUser', JSON.stringify(event.detail.response));
                    window.location.reload();
                }else{
                    document.getElementById('login-status').innerHTML = event.detail.response.status;
                    document.getElementById('login-message').innerHTML = event.detail.response.message;
                    innerDialog.open();
                }
            } else {
                document.getElementById('login-status').innerHTML = "Error";
                document.getElementById('login-message').innerHTML = "Server error!";
                innerDialog.open();
            }
        });
    </script>
</paper-dialog>