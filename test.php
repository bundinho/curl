<?php
require_once dirname(__FILE__) . "/inc/header.php";
$url = "http://localhost/~bundinho/WAU/curl/index.php";
buildGetUrl($url);
$postData = !empty($_POST) ? $_POST : array();
curlExec($url, $postData);

