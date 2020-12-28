<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

if(!isset($_GET['u'])){
    die('ERROR!');
}

$directUrl = urldecode($_GET['u']);

$ch = curl_init();
$headers = array(
    'Range: bytes=0-',
);
$options = array(
    CURLOPT_URL            => $directUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
    CURLOPT_HTTPHEADER     => $headers,
    CURLOPT_FOLLOWLOCATION => true,
    CURLINFO_HEADER_OUT    => true,
    CURLOPT_USERAGENT      => 'okhttp',
    CURLOPT_ENCODING       => "utf-8",
    CURLOPT_AUTOREFERER    => true,
    CURLOPT_COOKIEJAR      => 'cookie.txt',
    CURLOPT_COOKIEFILE     => 'cookie.txt',
    CURLOPT_REFERER        => 'https://www.tiktok.com/',
    CURLOPT_CONNECTTIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_MAXREDIRS      => 10,
);
curl_setopt_array( $ch, $options );

if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
}

$data = curl_exec($ch);    
curl_close($ch);
echo $data;