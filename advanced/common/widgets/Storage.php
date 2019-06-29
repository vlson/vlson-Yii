<?php
/**
 * Created by PhpStorm.
 * User: tiany
 * Date: 2019/06/29/0029
 * Time: 20:02
 */

namespace common\widgets;

use Yii;
use OSS\OssClient;


class Storage{
    public static $accessKeyId;
    public static $accessKeySecret;
    public static $endpoint;

    private static function initConfig(){
        // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
        self::$accessKeyId = Yii::$app->params['aliyun_accessKeyId'];
        self::$accessKeySecret = Yii::$app->params['aliyun_accessKeySecret'];
        // Endpoint以杭州为例，其它Region请按实际情况填写。
        self::$endpoint = Yii::$app->params['aliyun_endpoint'];
    }

    public static function uploadFile($bucket='', $object='', $temp_name){
        if(!$temp_name){
            echo '123456';die;
            return false;
        }
        self::initConfig();
        // 存储空间名称
        $bucket= $bucket ? $bucket : Yii::$app->params['aliyun_bucket'];
        // 文件名称
        $object = $object ? $object : md5('vlson_'.time()).".png";
        // <yourLocalFile>由本地文件路径加文件名包括后缀组成，例如/users/local/myfile.txt
        $filePath = $temp_name;

        try{
            $ossClient = new OssClient(self::$accessKeyId, self::$accessKeySecret, self::$endpoint);
            $back_data = $ossClient->uploadFile($bucket, $object, $filePath);
        } catch(OssException $e) {
            $back_data['info'] = ['http_code'=>500, 'errMsg'=>$e->getMessage()];
        }
        return $back_data['info'];
    }
}


