<paper-dialog id="createUserModal" modal>
    <form id="createUserModalForm" is="iron-form" action="service/mysql.php" method="post"
          on-iron-form-response="_onResponseRetrieved">
        <h2>Add new user</h2>
        <input type="hidden" name="createUser" value=""/>
        <paper-input label="first name" name="first_name" required></paper-input>
        <paper-input label="last name" name="last_name" required></paper-input>
        <paper-input label="home address" name="home_address"></paper-input>
        <paper-input label="email" name="email"></paper-input>
        <paper-input label="home phone" name="home_phone"></paper-input>
        <paper-input label="cell phone" name="cell_phone"></paper-input>
        <br>
        <div class="buttons">
            <paper-button dialog-dismiss onclick="createUserFn._reset(event)">Cancel</paper-button>
            <paper-button class="blue" raised autofocus onclick="createUserFn._submit(event)">
                <paper-spinner id="createUserSpinner" hidden></paper-spinner>
                Add
            </paper-button>
        </div>

    </form>
    <script>
        var createUserFn = {
            _submit: function (event) {
                if (createUserModalForm.validate()) {
                    createUserSpinner.active = true;
                    createUserSpinner.hidden = false;
                    // Simulate a slow server response.
                    setTimeout(function () {
                        Polymer.dom(event).localTarget.parentElement.parentElement.submit();
                    }, 1000);
                }
            },
            _reset: function (event) {
                createUserSpinner.hidden = true;
                var form = Polymer.dom(event).localTarget.parentElement.parentElement;
                form.reset();
            }
        }


        document.getElementById('createUserModalForm').addEventListener('iron-form-response', function (event) {
            createUserSpinner.hidden = true;
            console.log(event);
            console.log(event.detail.response);
            if (event.detail.response && event.detail.response.status) {
                window.location.reload();
//                document.getElementById('login-status').innerHTML = event.detail.response.status;
//                document.getElementById('login-message').innerHTML = event.detail.response.message;
//                innerDialog.open();
//                if (event.detail.response.status) {
//                    renderUserList(event.detail.response.users);
//                }
//
//            } else {
//                document.getElementById('login-status').innerHTML = "Error";
//                document.getElementById('login-message').innerHTML = "Server error!";
//                innerDialog.open();
            }
        });

    </script>
</paper-dialog>