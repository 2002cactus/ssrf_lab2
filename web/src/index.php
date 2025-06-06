<?php
error_reporting(0);
if (isset($_GET['source'])) {
    die(highlight_file(__FILE__));
}
$error = $content = '';
if (isset($_GET['url'])) {
    if (filter_var($_GET['url'], FILTER_VALIDATE_URL)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_GET['url']);

        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $output = curl_exec($ch);
        curl_close($ch);
        die();
    } else {
        die("Not a valid url");
    }
}
?>
<html>

<head>
    <!-- For UX/UI only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Proxy Service</a>
    </nav>
    <div class="container">
        <br />
        <a href="/?source">Source</a>
        <br /><br />
        <h4>Proxy Service</h4>
        <p>Give me a url</p>
        <pre><b>Goal:</b>Find port is openning</pre>
        <form>
            <input type="text" name="url" class="form-control" placeholder="url"><br />
            <input type="submit" class="button btn btn-success" value="Submit">
        </form>

        <p class="text-danger"><?php echo $error; ?></p>
    </div>
</body>

</html>
