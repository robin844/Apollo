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
use think\Model;

//class BannerModel extends Model
class BannerModel
{
//    protected $table = 'banner_item';
    public static function getBannerByID($id){

        $result = Db::query(
       //     'select * from banner_item where banner_id =?',[$id]);
              'select T1.key_word, T1.type, T2.url from banner_item as T1, image as T2 where T1.banner_id =? and T1.img_id = T2.id',[$id]);
        return $result;
        //return null;
        //hi hi, this is comment
    }
}