<?php
define('REAL_AUTOMATION_DIR', dirname(dirname(dirname(__FILE__))) . '/html/realautomation/realautomationhooks');

function execUrl($url, $data = array()){

    if(strpos($url, '?') == false){
        $url .= "?";
    }

    $arr = array();

    foreach($data as $key => $value){
        $arr[] = $key . "=" . urlencode($value);
    }

    $url .= implode('&', $arr);

    $ch = curl_init($url);

    curl_setopt_array($ch, array(
        //CURLOPT_FOLLOWLOCATION => true,
        //CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => false,
        CURLOPT_USERAGENT => 'InvestorFuse-Seq/v1.0',
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

function buildGetUrl(&$url, $keysToSkip = array())
{
    $array = array();
    if(!empty($_GET))
    {
        foreach($_GET as $key => $val)
        {
            if(!in_array($key, $keysToSkip)) $array [] = $key."=".urlencode($val);
        }

        if(!empty($array))
        {
            $url .= "?".implode("&", $array);
        }
    }
}

function curlExec($url, $data = array())
{
    $ch = curl_init($url);

    curl_setopt_array($ch, array(
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_USERAGENT => 'InvestorFuse-Seq/v1.0',
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}