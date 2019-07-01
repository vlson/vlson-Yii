<?php
return [
    'adminEmail' => 'lxj370832@163.com',
    'supportEmail' => 'lxj370832@163.com',
    'user.passwordResetTokenExpire' => 3600,
    'backend_label' => 'manage',
    'update_file_validator' =>[
        'class'         => 'yii\validators\FileValidator',
        'extensions'    => [
            'json',
            'txt',
            'jpg',
            'png',
            'jpeg',
            'md',
            'pdf',
            'rar',
            'zip',
            'doc',
            'docx',
            'flv',
            'xlsx',
            'pptx',
            'swf',
            'mp3',
        ],
        'checkExtensionByMimeType'=>false,
        'maxSize'       => 1024*1024*1024
    ],
    //aliyunOSS 存储
    'aliyun_accessKeyId'    =>  'Your AccessKeyId',
    'aliyun_accessKeySecret'=>  'Your AccessKeySecret',
    'aliyun_endpoint'   =>  'http://oss-cn-beijing.aliyuncs.com',
    'aliyun_bucket'    =>  'Your bucket',
];
