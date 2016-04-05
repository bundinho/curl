<?php
require_once dirname(dirname(__FILE__)) . "/inc/header.php";
$url = "http://localhost/~bundinho/WAU/investorfuse.com/realautomationhooks/wholesaledeals/hookOutgoingCreation.php";
buildGetUrl($url, array("item_id"));
$postData = array(
    "type" => "item.create",
    "resend" => "yes",
    "item_id" => $_GET["item_id"],
);
//var_dump($url);
//var_dump($postData);
//exit();
curlExec($url, $postData);