<?php
/**
 * 服务控制器
 */
class ServeController extends WapController{
	/**
	 * [actionList 资讯列表]
	 * @param  string $cate  [description]
	 * @param  string $ptpz  [description]
	 * @param  string $house [description]
	 * @return [type]        [description]
	 */
	public function actionList()
	{
		
	}
	/**
	 * [actionInfo 资讯详情]
	 * @param  string $id [description]
	 * @return [type]     [description]
	 */
	public function actionInfo($id='')
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'sort desc,updated desc';
		$infos = ArticleExt::model()->getYw()->normal()->getList($criteria);
		$data = $infos->data;
		$pager = $infos->pagination;
		$this->render('list',['infos'=>$data,'pager'=>$pager]);
	}

	public function actionDetail($id='')
	{
		$info = ArticleExt::model()->findByPk($id);
		if(!$id || !$info) {
			$this->redirect('list');
			Yii::app()->end();
		}
		
		$this->render('info',['info'=>$info]);
	}

	public function actionIndex()
	{
		$info = ArticleExt::model()->getFw()->normal()->find();
		// var_dump($info->attributes);exit;
		$this->render('index',['info'=>$info]);
	}
}