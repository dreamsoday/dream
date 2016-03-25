 <div id="show">
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
                          <th class="head0 nosort"><input type="checkbox" class="checkall"/></th>
                          <th class="head1">ID</th>
                            <th class="head0">菜品名称</th>
                            <th class="head1">图片</th>
                            <th class="head0">菜品分类</th>
                            <th class="head1">单位</th>
                            <th class="head0">价格</th>
                            <th class="head1">描述</th>
                            <th class="head0">添加时间</th>
                            <th class="head1">修改时间</th>
                            <th class="head0">编辑</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th class="head0 nosort"></th>
                        <th class="head1">ID</th>
                            <th class="head0">菜品名称</th>
                            <th class="head1">图片</th>
                            <th class="head0">菜品分类</th>
                            <th class="head1">单位</th>
                            <th class="head0">价格</th>
                            <th class="head1">描述</th>
                            <th class="head0">添加时间</th>
                            <th class="head1">修改时间</th>
                            <th class="head0">编辑</th>
                        </tr>
                    </tfoot>
                    <tbody>
              <?php foreach($menuname as $v):?> 
                        <tr class="gradeC">
                          <td align="center"><span class="center">
                            <input type="checkbox" value="<?=Html::encode($v->menu_id)?>" id="sele" name="check"/>
                          </span></td>
                          <td><?=Html::encode($v->menu_id)?></td>
                          
                            <td><?=Html::encode($v->menu_name)?></td>
                            <td><img src="<?=Html::encode($v->image_wx)?>" alt="" height='100px' width='100px'/></td>
                            <td><?=Html::encode($v['series']->series_name)?></td>
                            <td>份</td>
                            <td><?=Html::encode($v->menu_price)?></td>
                            <td><?=Html::encode($v->menu_desc)?></td>
                            <td><?=Html::encode((date("Y-m-d H:i:s",$v->created_at)))?></td>
                            <td><?=Html::encode((date("Y-m-d H:i:s",$v->updated_at)))?></td>
                            <td value="<?=Html::encode($v->menu_id)?>">
                            <a href="<?php echo Yii::$app->urlManager->createUrl('menu/editormenu')?>&&menu_id=<?php echo $v['menu_id']?>"><img src="/assets/images/gai.jpg" alt="" height="10" width="10"/></a>&nbsp;&nbsp;
                            <a href="javascript:void(0)" class="delone"><img src="/assets/images/laji.jpg" alt="" height="10" width="10"/></a></td>
                        </tr>
                         <?php endforeach?> 
                    </tbody>
                </table>
        </div>