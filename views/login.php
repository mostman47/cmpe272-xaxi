<paper-dialog id="login" modal>
    <form id="loginForm" is="iron-form" action="views/password.php" method="post"
          on-iron-form-response="_onResponseRetrieved">
        <h2>Login</h2>
        <paper-input label="username" name="username" required></paper-input>
        <paper-input label="password" name="password" type="password" required></paper-input>
        <br>
        <div class="buttons">
            <paper-button raised autofocus onclick="_delayedSubmit(event)" id="eventsDemoSubmit">
                <paper-spinner id="spinner" hidden></paper-spinner>
                Login
            </paper-button>
            <paper-button onclick="_reset(event)">Cancel</paper-button>
        </div>
    </form>
    <script>
        //        function _submit(event) {
        //            Polymer.dom(event).localTarget.parentElement.parentElement.submit();
        //        }
        //        //        function _onResponseRetrieved(e)
        //        //        {
        //        //           console.log(e);
        //        //        }
        //        function _reset(event) {
        //            var form = Polymer.dom(event).localTarget.parentElement.parentElement;
        //            form.reset();
        //            form.querySelector('.output').innerHTML = '';
        //        }
        //        Polymer({
        //            // Some scripts here.
        //
        //            // ...now your listener
        //            _onResponseRetrieved: function (e) {
        //                console.log(e.detail.response);
        //            },
        //        });
        //        document.getElementById('eventsDemo').addEventListener('iron-form-submit', function(event) {
        //            spinner.active = false;
        //            spinner.hidden = true;
        //            eventsDemoSubmit.disabled = false;
        //            this.querySelector('.output').innerHTML = JSON.stringify(event.detail);
        //        });
        loginForm.addEventListener('change', function (event) {
            // Validate the entire form to see if we should enable the `Submit` button.
            eventsDemoSubmit.disabled = !loginForm.validate();
        });
        function _delayedSubmit(event) {
            spinner.active = true;
            spinner.hidden = false;
            eventsDemoSubmit.disabled = true;
            // Simulate a slow server response.
            setTimeout(function () {
                Polymer.dom(event).localTarget.parentElement.parentElement.submit();
            }, 1000);
        }
        function _reset(event) {
            var form = Polymer.dom(event).localTarget.parentElement.parentElement;
            form.reset();
            form.querySelector('.output').innerHTML = '';
        }
        document.getElementById('loginForm').addEventListener('iron-form-submit', function (event) {
            spinner.active = false;
            spinner.hidden = true;
            eventsDemoSubmit.disabled = false;
//            this.querySelector('.output').innerHTML = JSON.stringify(event.detail);
            console.log(event);
        });
        document.getElementById('loginForm').addEventListener('iron-form-response', function (event) {
            console.log(event.detail.response);
        });

    </script>
</paper-dialog>