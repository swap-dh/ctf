<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $parsedUrl = parse_url($url);
    if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'flag.com') {
        echo "FLAG : ".file_get_contents('flag.txt');
    } else {
        echo "Nop~~";
    }
} else {
    echo "Please provide a URL parameter.";
}
?>
