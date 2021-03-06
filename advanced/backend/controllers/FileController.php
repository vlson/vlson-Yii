<?php
/**
 * Created by PhpStorm.
 * User: tiany
 * Date: 2019/06/29/0029
 * Time: 18:17
 */

namespace backend\controllers;


use PHPUnit\Framework\Exception;
use yii\web\Controller;
use yii\web\UploadedFile;
use Yii;
use common\widgets\Storage;

/*
 * 文件上传控制器
 * */
class FileController extends Controller
{
    public function beforeAction($action){
        if ($action->id == 'upload') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    public function actionUpload(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        try{
            $result = [
                'code' => 500,
                'success' => 0,
                'msg' => '',
                'message' => '',
                'url' => '',
            ];
            $file_key = array_keys($_FILES);
            $first_file_field_name = reset($file_key);
            if(!$first_file_field_name) {
                $result['msg'] = 'Please upload one file at least.';
                return $result;
            }
            if(!is_string($_FILES[$first_file_field_name]['name'])) {
                $result['msg'] = 'Please upload one file at most.';
                return $result;
            }
            //文件是否存在：存在返回文件对象(名称，全路径，文件类型，大小，错误)，不存在返回空
            $upload_object = UploadedFile::getInstanceByName($first_file_field_name);
            //创建对象
            $file_validator = \Yii::createObject(\Yii::$app->params['update_file_validator']);
            $error = [];
            if (!$file_validator->validate($upload_object, $error)) {
                throw new \Exception($error);
            }

            //上传文件
            $bucket = 'vlson';
            $file_type = explode('/', $upload_object->type)[1];
            $object = "vland/image/".md5('vlson_'.time()).".$file_type";

            $info = Storage::uploadFile($bucket, $object, $upload_object->tempName);
            $result=[
                'code'=> $info['http_code'],
                'success' => 1,
                'msg'=>'ok',
                'url' => $info['url'],
                'data'=>[
                    'url'       => $info['url'],
                    'file_name' => $upload_object->name
                ]
            ];
        }catch (Exception $e){
            $result['msg'] = $e->getMessage();
            $result['message'] = $e->getMessage();
            $result['data'] = $_FILES;
        }
        return $result;
    }
}