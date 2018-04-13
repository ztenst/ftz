<?php
class AhaController extends AdminController{
	public function actionList()
	{
		$criteria = new CDbCriteria;
		$infos = AhaExt::model()->getList($criteria,2);
		// var_dump($infos->pagination);exit;
		// $infos->data dengjiayu AhaExt::model()->findAll()
		$this->render('list',['infos'=>$infos->data,'pager'=>$infos->pagination]);
	}
	public function actionEdit($id='')
	{
		$info = $id?AhaExt::model()->findByPk($id):new AhaExt;
		if(Yii::app()->request->getIsPostRequest()) {
			$values = Yii::app()->request->getPost(get_class($info));
			$info->attributes = $values;var_dump($info->attributes);exit;
			if($info->save()) {
				$this->setMessage('bing0!');
				$this->redirect('/admin/aha/list');
			}
		}
		$this->render('edit',['info'=>$info]);
	}
}