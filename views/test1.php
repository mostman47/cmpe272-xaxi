<!DOCTYPE html>
<html>
<body>

<div id="result"></div>

<script>
    if (typeof(Storage) != "undefined") {
        localStorage.setItem("lastname", "Smith");

        var lastname = localStorage.getItem("lastname");
        console.log(lastname);
    } else {
        document.getElementById("result").innerHTML = "Sorry, your browser does not support Wb Storage...";
    }
</script>

</body>
</html>