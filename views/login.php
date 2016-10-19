<paper-dialog id="login" modal>
    <form action="views/password.php" method="post">
        <h2>Login</h2>
        <paper-input label="username" name="username"></paper-input>
        <paper-input label="password" name="password" type="password"></paper-input>
        <br>
        <div class="buttons">
            <input type="submit" value="adf">
            <paper-button type="submit" raised autofocus>Login</paper-button>
            <paper-button dialog-confirm>Cancel</paper-button>
        </div>
    </form>
</paper-dialog>