<?php
/**
 * IndexController
 */
class IndexController extends ApiController
{

	public function init()
	{
		parent::init();
		// session_start();
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
			'qr'=>Yii::app()->request->getHostInfo().'/ftz_html/images/ercode2.jpg',
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
		$ct = Yii::app()->db->createCommand("select count(id) from score")->queryScalar();
		$range = Yii::app()->db->createCommand($sql)->queryScalar();
		$percent = round(($ct-$range)/$ct,2);
		if($num==0) {
			$percent = 0;
		}
		$this->frame['data'] = ['range'=>$range,'percent'=>($percent*100).'%'];
	}

	public function actionXingInfo($id='')
	{
		if($xing = XingExt::model()->findByPk($id)) {
			if(isset($_SESSION['xings_view'])) {
				$data = json_decode($_SESSION['xings_view'],true);
				// var_dump($data);exit;
				$in = 0;
				foreach ($data as $key => $value) {
					// var_dump($value);exit;
					if($id==$value['id']) {
						$in = 1;
						break;
					}
				}
				if($in==0) {
					array_unshift($data, ['id'=>$id,'name'=>$xing->name]);
					$_SESSION['xings_view'] = json_encode(array_slice($data,0,4));
				}
				
			} else {
				$_SESSION['xings_view'] = json_encode([['id'=>$id,'name'=>$xing->name]]);
			}
			
			$this->frame['data'] = [
				'id'=>$id,
				'title'=>$xing->title,
				'content'=>$xing->content
			];
		} else {
			$this->returnError('暂无此姓');
		}
	}

	public function actionXingSearch($kw='')
	{
		$kw1 = $kw.'氏';
		if($xing = XingExt::model()->find("name='$kw' or name='$kw1'")) {
			$id = $xing->id;
			if(isset($_SESSION['xings_view'])) {
				$data = json_decode($_SESSION['xings_view'],true);
				// var_dump($data);exit;
				$in = 0;
				foreach ($data as $key => $value) {
					if($id==$value['id']) {
						$in = 1;
						break;
					}
				}
				if($in==0) {
					array_unshift($data, ['id'=>$id,'name'=>$xing->name]);
					$_SESSION['xings_view'] = json_encode(array_slice($data,0,4));
				}
			
			} else {
				$_SESSION['xings_view'] = json_encode([['id'=>$id,'name'=>$xing->name]]);
			}
			$this->frame['data'] = $id;
		} else {
			$this->returnError('暂无此姓');
		}
	}

	public function actionXingList()
	{
		$data = $data['views'] = $data['sort'] = $data['list'] = [];
		if(isset($_SESSION['xings_view'])) {
			$data['views'] = json_decode($_SESSION['xings_view'],true);
		}
		$sorts = XingExt::model()->findAll(['order'=>'week_hits desc','limit'=>10]);
		$sorts && shuffle($sorts);
		if($sorts) {
			foreach ($sorts as $key => $value) {
				$data['sort'][] = ['id'=>$value['id'],'name'=>$value['name']];
			}
		}
		$xings = XingExt::model()->findAll();
		if($xings) {
			foreach ($xings as $key => $value) {
				$tmp[$value->py][] = ['id'=>$value['id'],'name'=>$value['name']];
			}
			ksort($tmp);
			$data['list'] = $tmp;
		}
		$this->frame['data'] = $data;
	}

}