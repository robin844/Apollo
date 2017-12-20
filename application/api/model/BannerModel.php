<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/15
 * Time: 17:53
 */

namespace app\api\model;


use think\Db;
use think\Exception;

class BannerModel
{
    public static function getBannerByID($id){
//        try{
//            1/0;
//        }catch (Exception $ex){
//            throw $ex;
//        }
//
//        return 'this is Banner Info';
        $result = Db::query(
            'select * from banner_item where banner_id =?',[$id]);
        return $result;
        //return null;
    }
}