<?php
namespace frontend\models;
use common\models\User;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "zss_add".
 *
 * @property integer $add_id
 * @property string $add_price
 * @property integer $giveaway_id
 * @property integer $add_show
 * @property integer $created_at
 * @property integer $updated_at
 */
class AmountExcel extends \yii\db\ActiveRecord
{
    public function amount($order_realamount)
    {
 /**
  * 引入excel类
  */
  //require_once '/assets/excel/Classes/PHPExcel.php';
  require_once '/data0/htdocs/www/zss/zss/frontend/web/assets/excel/Classes/PHPExcel.php';
  //实例化
  $phpexcel = new \PHPExcel();
  //设置比标题
  $phpexcel->getActiveSheet()->setTitle('财务统计报表');
  //设置表头
  $phpexcel->getActiveSheet() ->setCellValue('A1','店名')
                            ->setCellValue('B1','菜名')
                            ->setCellValue('C1','份数')
                            ->setCellValue('D1','金额')
                            ->setCellValue('E1','时间');
  
        $i=2;
        foreach($order_realamount as $val){
        $phpexcel->getActiveSheet() ->setCellValue('A'.$i,$val['shop_name'])
                                ->setCellValue('B'.$i, $val['menu_name'])
                                ->setCellValue('C'.$i, $val['menu_num'])
                                ->setCellValue('D'.$i, $val['order_realamount'])
                                ->setCellValue('E'.$i, date('Y-m-d H:i:s',$val['order_paytime']));
        $i++;
    }
    $obj_Writer = \PHPExcel_IOFactory::createWriter($phpexcel,'Excel5');
    $filename ='Export'. date('Y-m-d').".xls";//文件名
    //设置header头
    header("Content-Type: application/force-download"); 
    header("Content-Type: application/octet-stream"); 
    header("Content-Type: application/download"); 
    header('Content-Disposition:inline;filename="'.$filename.'"'); 
    header("Content-Transfer-Encoding: binary"); 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
    header("Pragma: no-cache"); 
    $obj_Writer->save('php://output');//输出
    die();//种植执行
    }
}

