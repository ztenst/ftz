<?php
/**
 * 订单控制器
 * @author tivon 2017-4-19
 */
class OrderController extends AdminController{
	/**
	 * 订单列表
	 */
	public function actionList($type='phone',$value='',$time_type='created',$time='')
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'updated desc';
		if($value = trim($value))
            if ($type=='phone') {
                $criteria->addSearchCondition('phone', $value);
            } elseif ($type=='username') {
            	$criteria->addSearchCondition('username', $value);
            } elseif ($type=='pid') {
            	$criteria->addSearchCondition('username', $value);
            }
        //添加时间、刷新时间筛选
        if($time_type!='' && $time!='')
        {
            list($beginTime, $endTime) = explode('-', $time);
            $beginTime = (int)strtotime(trim($beginTime));
            $endTime = (int)strtotime(trim($endTime));
            $criteria->addCondition("{$time_type}>=:beginTime");
            $criteria->addCondition("{$time_type}<:endTime");
            $criteria->params[':beginTime'] = TimeTools::getDayBeginTime($beginTime);
            $criteria->params[':endTime'] = TimeTools::getDayEndTime($endTime);

        }
		// if($cate) {
		// 	$criteria->addCondition('cid=:cid');
		// 	$criteria->params[':cid'] = $cate;
		// }
		$news = OrderExt::model()->undeleted()->getList($criteria,20);
		// $houses = [];
		// if($prs = $news->data) 
		// 	foreach ($prs as $key => $v) {
		// 		$v->houseInfo && $houses[$v->house] = $v->houseInfo->name;
		// 	}
		
		$this->render('list',[
			// 'cates'=>$this->cates,
			'list'=>$news->data,
			'pager'=>$news->pagination,
			'type' => $type,
            'value' => $value,
            'time' => $time,
            'time_type' => $time_type,
            // 'cate'=>$cate,
			// 'xl'=>$xl,
			// 'ptpz'=>$ptpz,
			]);
	}
}