<?php

require_once 'vendor/autoload.php';

$string = <<<HTML
<!doctype html>
<html lang="en">

<!-- HEAD -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
</head>
<!--HEAD-->
<body class="body hide" id="body">
    <h1 class="h1">Hello, how are you?</h1>
    
    <p class="p bold">
        <span>Hello, how are you?</span>
        <button class="active loading">Active</button>
        Hello, how are you?
    </p>
</body>

<!-- Many line
comment 
for testing -->

<script type="text/javascript"></script>
<script type="text/javascript" src="/js/index.js?a=1"></script>
<script type="text/javascript" defer async>
    console.log('Yes');
</script>

</html>
HTML;

echo minifyHTML($string), "\n";
