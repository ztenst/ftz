<?php 
use Qiniu\Auth;
/**
 * 图片相关接口
 */
class ImageController extends ApiController
{   
    /**
     * 二维码接口
     * @return png图片
     */
    public function actionQrCode($data,$size=10)
    {
        $errorCorrectionLevel = 'L';
        $data = urldecode($data);       
        QRcode::png($data, false, $errorCorrectionLevel, $size, 0);
    }

    /**
     * [actionQnUpload 七牛图片上传]
     * @return [type] [description]
     */
    public function actionQnUpload()
    {
        $auth = new Auth(Yii::app()->file->accessKey,Yii::app()->file->secretKey);
        $policy = array(
            'mimeLimit'=>'image/*',
            'fsizeLimit'=>10000000,
            'saveKey'=>Yii::app()->file->createQiniuKey(),
        );
        $token = $auth->uploadToken(Yii::app()->file->bucket,null,3600,$policy);
        echo CJSON::encode( array('uptoken'=>$token));
        Yii::app()->end();
    }

    public function actionUpImage()
    {  
        // var_dump(1);exit;
        $string = Yii::app()->request->getPost('string','');
        $auth = new Auth(Yii::app()->file->accessKey,Yii::app()->file->secretKey);
        $policy = array(
            'mimeLimit'=>'image/*',
            'fsizeLimit'=>10000000,
            'saveKey'=>Yii::app()->file->createQiniuKeyJpg(),
        );
        // var_dump(Yii::app()->file->createQiniuKey());exit;
        $token = $auth->uploadToken(Yii::app()->file->bucket,null,3600,$policy);
        $headers = array();
        $headers[] = 'Content-Type:image/png';
        $headers[] = 'Authorization:UpToken '.$token;
        $ch = curl_init();  
        curl_setopt($ch, CURLOPT_URL,'http://upload.qiniu.com/putb64/-1');  
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        //curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($ch);  
        curl_close($ch);  
        // var_dump($data);exit;
        $data = json_decode($data,true);
        if(isset($data['key'])) {
            $this->frame['data'] = ImageTools::fixImage($data['key']);
        }
        else {
            $this->returnError($data['error']);
        }
    }  
}
?>
