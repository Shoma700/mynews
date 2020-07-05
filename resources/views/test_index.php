<html>
<head>
    <title>Hello/Index</title>
    <style>
    body {font-size:16pt; color:#999; }
    h1 {font-size:100pt; text-align:right; color:#f6f6f6;
        margin:-50px 0px -100px 0px; }
    </style>
</head>
<body>
    <h1>Index</h1>
    <p>this is a sample page with php-template.</p>
    <p><?php echo $msg; ?></p>
    <p>ID: <?php echo $id; ?></p>
    <p>Query_String: <?php echo $queryString; ?></p>
    <p><?php echo date("y年n月j日"); ?></p>
</body>
</html>