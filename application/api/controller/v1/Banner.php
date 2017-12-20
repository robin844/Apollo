<?php
/**
 * Created by PhpStorm.
 * User: Robin Chen
 * Date: 2017/12/11
 * Time: 22:22
 */

namespace app\api\controller\v1;

use app\api\model\BannerModel;
use app\api\validate\IsINT;
use app\lib\exception\exceptions\NoBannerData;
use think\Exception;

class Banner
{
    /*
     * URL      /banner/:id
     * HTTP     GET
     *
     * Input:
     * $id      Banner id
     *
     * Output:
     *
     */
    public function getBanner1(){
        return 'Test';
    }
    public function getBanner($id){
        //check the input params
        $validate = new IsINT();
        $validate->goCheck();

        //get the Banner data by banner ID
        //try{
            $banner = BannerModel::getBannerByID($id);
//        }catch (Exception $ecp){
//            $rtnMsg = [
//                //get the error message
//                'return_MSG' => 'This is test message!',
//                'return_Code' => '10001',
//            ];
//            // return the error message
//            //json(array, code)
//            //array => return data
//            // code => Http state code, e.g. 400, 404, 500
            //return json($rtnMsg, 400);

//        }
            if($banner){
                //if no exception, return the correct data
                return json($banner,200);
            }else{
                //if have exception, then throw it to exception handler
                throw new NoBannerData();
                //throw  new Exception();
                //return '11111111111';
            }
           // return json($rtnMsg,200);

    }
}