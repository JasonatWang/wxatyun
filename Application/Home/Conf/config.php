<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_CONTROLLER'    =>  'Login',
    'DEFAULT_ACTION'        =>  'login',
    //七牛云接口
    'UPLOAD_SITEIMG_QINIU' => array (
        'maxSize' => 104857600,//文件大小
        'rootPath' => './',
        'savePath' => "./".$_SESSION['userid']."/",
        'saveName' => array ('uniqid', ''),
        'driver' => 'Qiniu',
        'autoSub' => false,
        'driverConfig' => array (
            'secretKey' => 'sHs_ZXulZv6Otn4e19AVxBQ4L5B7d37vLLI2rqdh',
            'accessKey' => '9tonnr0HOS2UD716707BKD22wC0pXfMwMmzJTOli',
            'domain' => 'odf445i0o.bkt.clouddn.com',
            'bucket' => 'wxatyun',
        ),
    ),
);