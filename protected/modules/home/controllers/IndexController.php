<?php
class IndexController extends HomeController
{
    public function actionIndex()
    {
        $this->banner = '';
    	$this->layout = '/layouts/base';
        $this->pageTitle = '首页';
        if(Yii::app()->request->getIsPostRequest()) {

            $data['name'] = Yii::app()->request->getPost('name');
            $data['mail'] = Yii::app()->request->getPost('email');
            $data['phone'] = Yii::app()->request->getPost('tel');
            $data['msg'] = Yii::app()->request->getPost('content');
            $guest = new GuestExt;
            $guest->attributes = $data;
            $guest->save();
            echo json_encode(['code'=>0,'data'=>'']);
            Yii::app()->end();
        }
        $this->render('index');
    }

    public function actionAbout()
    {
        $info = ArticleExt::model()->getJs()->normal()->find();
        // var_dump($info->attributes);exit;
        $this->render('about',['info'=>$info]);
    }

    public function actionContact()
    {
        $info = ArticleExt::model()->getLx()->normal()->find();
        // var_dump($info->attributes);exit;
        $this->render('contact',['info'=>$info]);
    }
}
