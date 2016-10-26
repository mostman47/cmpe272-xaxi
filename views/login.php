<paper-dialog id="loginModal" modal>
    <form id="loginForm" is="iron-form" action="service/authentication.php" method="post"
          on-iron-form-response="_onResponseRetrieved">
        <h2>Login</h2>
        <paper-input label="username" name="username" required></paper-input>
        <paper-input label="password" name="password" type="password" required></paper-input>
        <br>
        <div class="buttons">

            <paper-button dialog-dismiss onclick="_reset(event)">Cancel</paper-button>
            <paper-button raised autofocus onclick="_submit(event)" id="eventsDemoSubmit">
                <paper-spinner id="spinner" hidden></paper-spinner>
                &nbsp;
                Login
            </paper-button>
        </div>
        <paper-dialog id="innerDialog">
            <h2 id="login-status" class="text-center text-warning"></h2>
            <p id="login-message"></p>
            <div class="buttons">
                <paper-button dialog-dismiss onclick="_closeInner(event)">Ok</paper-button>
            </div>
        </paper-dialog>
    </form>
    <script>
        var loginEvent;

        function _submit(event) {
            if (loginForm.validate()) {
                spinner.active = true;
                spinner.hidden = false;
                eventsDemoSubmit.disabled = true;
                // Simulate a slow server response.
                setTimeout(function () {
                    Polymer.dom(event).localTarget.parentElement.parentElement.submit();
                }, 1000);
            }
        }

        function _reset(event) {
            spinner.hidden = true;
            eventsDemoSubmit.disabled = false;
            var form = Polymer.dom(event).localTarget.parentElement.parentElement;
            form.reset();
        }

        function _closeInner(event) {
            console.log(loginModal);
            if (loginEvent.detail.response && loginEvent.detail.response.status) {
                loginModal.close();
            }

        }

        function renderUserList(users) {
            var str = ""
            for (var i = 0; i < users.length; i++) {
                str += "<li>" + users[i] + "</li>";
            }
            document.getElementById('user-list').innerHTML = str;
            document.getElementById('loginButton').remove();

        }

        document.getElementById('loginForm').addEventListener('iron-form-response', function (event) {
            spinner.hidden = true;
            eventsDemoSubmit.disabled = false;
            console.log(event);
            console.log(event.detail.response);
            loginEvent = event;
            if (event.detail.response) {
                document.getElementById('login-status').innerHTML = event.detail.response.status;
                document.getElementById('login-message').innerHTML = event.detail.response.message;
                innerDialog.open();
                if(event.detail.response.status){
                    renderUserList(event.detail.response.users);
                }

            } else {
                document.getElementById('login-status').innerHTML = "Error";
                document.getElementById('login-message').innerHTML = "Server error!";
                innerDialog.open();
            }
        });

    </script>
</paper-dialog>