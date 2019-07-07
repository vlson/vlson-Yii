<?php
/**
 * Created by PhpStorm.
 * User: 51CTO
 * Date: 2019/7/4
 * Time: 10:44
 */

namespace common\service;

use common\models\Like;

class Func{
    public static function isLike($art_id){
        $ip = \Yii::$app->request->userIP;
        $model = Like::find()
            ->where(['ip'=>$ip, 'art_id'=>$art_id, 'status'=>1])
            ->all();
        if($model){
            return true;
        }
        return false;
    }



}