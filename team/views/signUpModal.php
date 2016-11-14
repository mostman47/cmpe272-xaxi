<paper-dialog id="signUpModal" modal>
    <form id="signUpForm" is="iron-form" action="service/authentication.php" method="post"
          on-iron-form-response="_onResponseRetrieved">
        <h2>Sign Up</h2>
        <paper-input label="username" name="username" required></paper-input>
        <paper-input label="password" name="password" type="password" required></paper-input>
        <paper-input label="re-type password" name="re-password" type="password"
                     required></paper-input>
        <br>
        <div class="buttons">

            <paper-button dialog-dismiss onclick="signUpFn._reset(event)">Cancel</paper-button>
            <paper-button class="blue" raised autofocus onclick="signUpFn._submit(event)">
                <paper-spinner id="signUpSpinner" hidden></paper-spinner>
                Sign Up
            </paper-button>
        </div>
        <paper-dialog id="innerSUDialog">
            <h2 id="signUp-status" class="text-center text-warning"></h2>
            <p id="signUp-message"></p>
            <div class="buttons">
                <paper-button dialog-dismiss onclick="signUpFn._closeInner(event)">Ok</paper-button>
            </div>
        </paper-dialog>
    </form>
    <script>
        var signUpEvent;
        var signUpFn = {
            _submit: function (event) {
                if (signUpForm.validate()) {
                    if ($("#signUpForm input[name=password]")[0].value !== $("#signUpForm input[name=re-password]")[0].value) {
                        document.getElementById('signUp-status').innerHTML = "Error";
                        document.getElementById('signUp-message').innerHTML = "Re-type password is not the same!";
                        innerSUDialog.open();
                    }else {
                        signUpSpinner.active = true;
                        signUpSpinner.hidden = false;
                        // Simulate a slow server response.
                        setTimeout(function () {
                            Polymer.dom(event).localTarget.parentElement.parentElement.submit();
                        }, 1000);
                    }
                }
            },
            _reset: function (event) {
                signUpSpinner.hidden = true;
                var form = Polymer.dom(event).localTarget.parentElement.parentElement;
                form.reset();
            },
            _closeInner: function (event) {
                console.log(signUpModal);
                if (signUpEvent.detail.response && signUpEvent.detail.response.status) {
                    signUpModal.close();
                }
            }
        };
        function renderUserList(users) {
            var str = ""
            for (var i = 0; i < users.length; i++) {
                str += "<li>" + users[i] + "</li>";
            }
            document.getElementById('user-list').innerHTML = str;
            document.getElementById('signUpButton').remove();
        }
        ;

        document.getElementById('signUpForm').addEventListener('iron-form-response', function (event) {
            signUpSpinner.hidden = true;
            console.log(event);
            console.log(event.detail.response);
            signUpEvent = event;
            if (event.detail.response) {
                document.getElementById('signUp-status').innerHTML = event.detail.response.status;
                document.getElementById('signUp-message').innerHTML = event.detail.response.message;
                innerSUDialog.open();
                if (event.detail.response.status) {
                    renderUserList(event.detail.response.users);
                }
            } else {
                document.getElementById('signUp-status').innerHTML = "Error";
                document.getElementById('signUp-message').innerHTML = "Server error!";
                innerSUDialog.open();
            }
        });
    </script>
</paper-dialog>