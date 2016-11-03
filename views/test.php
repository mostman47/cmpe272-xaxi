<html xmlns="" http://www.w3.org/1999/xhtml">
<head>
    <title>Environment Variables</title>
</head>

<body>
<table border="0" cellpadding="2" cellspacing="0" width="100%">
    <?php
    foreach ($_SERVER as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    ?>
</table>
</body>
</html>