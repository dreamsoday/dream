<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
                    <colgroup>
                        <col class="con0" style="width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>

                            <th class="head0">订单号</th>
                            <th class="head0">用户名</th>
                            <th class="head0">菜名</th>
                            <th class="head0">地址</th>
                            <th class="head0">手机号</th>
                            <th class="head0">类型</th>
                            <th class="head0">运费</th>
                            <th class="head0">支付状态</th>
                            <th class="head0">支付方式</th>
                            <th class="head0">总价格</th>
                            <th class="head0">时间</th>
                            <th calss='head0'>操作订单</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    <!--             循环订单列表-->
                    <?php foreach($order as $k=>$v):?>
                        <tr class="gradeX">
                          
                            <td><?= Html::encode($v['order_sn']) ?></td>
                            <td><?= Html::encode($v['user_name']) ?></td>
                            <td><?= Html::encode($v['menu_name']) ?></td>
                            <td><?= Html::encode($v['order_address']) ?></td>
                            <td><?= Html::encode($v['user_phone']) ?></td>
                            <td class="center">
                                     <?php if($v['delivery_type']==1)
                                     {
                                        echo "外卖";
                                     }
                                else if($v['delivery_type']==2)
                                    {
                                            echo "自取";
                                    }
                                else if($v['delivery_type']==3)
                                    {
                                        echo "餐食";
                                    }
                            ?>
                            </td>
                            <td class="center"><?= Html::encode($v['order_freight']) ?></td>
                            <td class="center">
                                <?php if($v['order_paystatus']==1)
                                {
                                        echo "未支付";
                                }
                                else if($v['order_paystatus']==2)
                                {
                                        echo "已支付";
                                }
                                else if($v['order_paystatus']==3)
                                {
                                    echo "支付失败";
                                }?>
                            </td>
                            <td class="center"><?= Html::encode($v['payment_mode']) ?></td>
                            <td class="center"><?= Html::encode($v['order_realamount']) ?></td>
                            <td class="center"><?= Html::encode(date("Y-m-d H:i:s",$v['created_att'])) ?></td>
                            <td value="<?php echo $v['order_id']?>"><a href="<?php echo Yii::$app->urlManager->createUrl('order/order_details')?>&order_id=<?php echo $v['order_id']?>"  id='chakan'>查看详情</a></td>                        
                        </tr>
                     <?php endforeach;?>   
                    </tbody>
        </table>