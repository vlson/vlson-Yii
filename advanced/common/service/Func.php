<?php
/**
 * Created by PhpStorm.
 * User: 51CTO
 * Date: 2019/7/4
 * Time: 10:44
 */

namespace common\service;


class Func{
    public static function getIP(){
        global $ip;
        if (getenv("HTTP_CLIENT_IP")){
            $ip = getenv("HTTP_CLIENT_IP");
        }else if(getenv("HTTP_X_FORWARDED_FOR")){
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        }else if(getenv("REMOTE_ADDR")){
            $ip = getenv("REMOTE_ADDR");
        }else{
            $ip = "Unknow";
        }
        return $ip;
    }

}