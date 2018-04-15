<?php
/**
 * IndexController
 */
class IndexController extends ApiController
{

	public function init()
	{
		parent::init();
		header("Access-Control-Allow-Origin: *");
	}
	public function actionIndex()
	{
		$this->frame['data'] = 'test';
	}

	public function actionGetWords($level='1')
	{
		$data = [];
		$res = FtzExt::model()->normal()->findAll("level=$level");
		if($res) {
			foreach ($res as $key => $value) {
				$data[] = [
					'id'=>$value->id,
					'jtz'=>$value->jtz,
					'correct'=>$value->correct,
					'ftz1'=>$value->ftz1,
					'ftz2'=>$value->ftz2,
					'ftz3'=>$value->ftz3,
					'ftz4'=>$value->ftz4,
					'ftz5'=>$value->ftz5,
					'ftz6'=>$value->ftz6,

				];
			}
		}
		$this->frame['data'] = $data;

	}

	public function actionGetConfig()
	{
		$this->frame['data'] = [
			'rule'=>SiteExt::getAttr('qjpz','rule'),
			'qr'=>SiteExt::getAttr('qjpz','wxQr'),
		];
	}

	public function actionSetScore($num='')
	{
		$obj = new ScoreExt;
		$obj->num = $num;
		$obj->save();
	}

	public function actionGetRange($num='')
	{
		$sql = "select count(1)+1 as 'range' from score where num>(select distinct(num) from score where num=$num)";
		$this->frame['data'] = Yii::app()->db->createCommand($sql)->queryScalar();
	}
}