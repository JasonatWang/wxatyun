<?php
/**
 * Created by PhpStorm.
 * User: 王霄
 * Date: 2016/9/13
 * Time: 18:51
 */
function Qiniu_Encode($str) // URLSafeBase64Encode
{
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($str));
}
function Qiniu_Sign($url) {//$info里面的url

    $setting=C("UPLOAD_SITEIMG_QINIU");
    $setting['savePath']="./".$_SESSION['userid']."/";
    $duetime = NOW_TIME + 86400;//下载凭证有效时间
    $DownloadUrl = $url . '&e=' . $duetime;
    $Sign = hash_hmac ( 'sha1', $DownloadUrl, $setting ["driverConfig"] ["secretKey"], true );
    $EncodedSign = Qiniu_Encode ( $Sign );
    $Token = $setting ["driverConfig"] ["accessKey"] . ':' . $EncodedSign;
    $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
    return $RealDownloadUrl;
}