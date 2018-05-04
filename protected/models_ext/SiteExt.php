<?php 
/**
 * 站点配置类
 * 数据结构为 name为 qjpz value为 属性分类的key-value组成的json数据
 * @author steven.allen <[<email address>]>
 * @date(2017.2.13)
 */
class SiteExt extends Site{

    // 属性
    public static $cates = [
        // pc首页轮播图
        'pcIndexImages'=>[],
        'pcProductImage'=>'',
        'pcNewsImage'=>'',
        'pcTeamImage'=>'',
        'pcServiceImage'=>'',
        'pcContactImage'=>'',
        'pcServiceTopImage'=>'',
        'pcAboutTopImage'=>'',
        'pcTeamTopImage'=>'',
        'pcNewsTopImage'=>'',
        'pcContactTopImage'=>'',
        // pcLogo
        'pcLogo'=>'',
        // 站点客服
        'sitePhone'=>'',
        // 联系qq
        'qq'=>'',
        // 邮箱
        'mail'=>'',
        // 微信二维码
        'wxQr'=>'',
        'addr'=>'',
        'wx'=>'',
        'yb'=>'',
        'rule'=>'',

    ];
    public static $cateName = [
        'qjpz' => '全局配置',
    ];

    // 属性分类
    public static $cateTag = [
        'qjpz'=> [
            'wxQr'=>['type'=>'image','max'=>1,'name'=>'公众号二维码'],
            'rule'=>['type'=>'text','name'=>'规则'],
            'xinginfoword'=>['type'=>'text','name'=>'姓氏详情页底部文案'],
            // 'pcIndexImages'=>['type'=>'multiImage','max'=>4,'name'=>'pc首页轮播图'],
            // 'pcLogo'=>['type'=>'image','max'=>1,'name'=>'pc版logo'],
            // 'sitePhone'=>['type'=>'text','name'=>'站点客服'],
            // 'qq'=>['type'=>'text','name'=>'联系qq'],
            // 'mail'=>['type'=>'text','name'=>'邮箱'],
            // 'wxQr'=>['type'=>'image','max'=>1,'name'=>'公众号二维码'],
            // 'addr'=>['type'=>'text','name'=>'地址'],
            // 'wx'=>['type'=>'text','name'=>'公众号微信'],
            // 'yb'=>['type'=>'text','name'=>'邮编'],
            // 'pcProductImage'=>['type'=>'image','max'=>1,'name'=>'pc首页案例背景图'],
            // 'pcNewsImage'=>['type'=>'image','max'=>1,'name'=>'pc首页新闻背景图'],
            // 'pcTeamImage'=>['type'=>'image','max'=>1,'name'=>'pc首页团队背景图'],
            // 'pcServiceImage'=>['type'=>'image','max'=>1,'name'=>'pc首页服务背景图'],
            // 'pcContactImage'=>['type'=>'image','max'=>1,'name'=>'pc首页联系背景图'],
            // 'pcServiceTopImage'=>['type'=>'image','max'=>1,'name'=>'pc服务页面头图'],
            // 'pcAboutTopImage'=>['type'=>'image','max'=>1,'name'=>'pc关于页面头图'],
            // 'pcTeamTopImage'=>['type'=>'image','max'=>1,'name'=>'pc团队页面头图'],
            // 'pcNewsTopImage'=>['type'=>'image','max'=>1,'name'=>'pc新闻页面头图'],
            // 'pcContactTopImage'=>['type'=>'image','max'=>1,'name'=>'pc联系页面头图'],
            ],
    ];

	/**
     * 定义关系
     */
    public function relations()
    {
        return array(
            // 'baike'=>array(self::BELONGS_TO, 'BaikeExt', 'bid'),
        );
    }

    /**
     * @return array 验证规则
     */
    public function rules() {
        $rules = parent::rules();
        return array_merge($rules, array(
            array(implode(",", array_keys(self::$cates)) ,'safe'),
        ));
    }

    /**
     * 返回指定AR类的静态模型
     * @param string $className AR类的类名
     * @return CActiveRecord Admin静态模型
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function afterFind() {
        parent::afterFind();
    }

    public function beforeValidate() {
        if($this->getIsNewRecord())
            $this->created = $this->updated = time();
        else
            $this->updated = time();
        return parent::beforeValidate();
    }

    /**
     * 命名范围
     * @return array
     */
    public function scopes()
    {
        $alias = $this->getTableAlias();
        return array(
            'sorted' => array(
                'order' => 'sort desc',
            )
        );
    }

    // 重写get魔术方法
    public function __get($value)
    {
        if(in_array($value, array_keys(self::$cates))) {
            $dc = json_decode($this->value,true);
            if($dc && isset($dc[$value])) {
                return $dc[$value];
            }
        } else {
            return parent::__get($value);
        }
    }

    // 重写set魔术方法
    public function __set($name, $value)
    {
        if(isset(self::$cates[$name])) {
            if(is_array($this->value))
                $data_conf = $this->value;
            else
                $data_conf = CJSON::decode($this->value);
            self::$cates[$name] = $value;
            $data_conf[$name] = $value;
            $this->value = json_encode($data_conf);
        }
        else
            parent::__set($name, $value);
    }

    /**
     * 通过name获取
     */
    public function getSiteByCate($cate)
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'name=:cate',
            'order' => 'id ASC',
            'params' => array(':cate'=>$cate)
        ));
        return $this;
    }

    public static function getAttr($cate='',$attr='')
    {
        $model = self::model()->getSiteByCate($cate)->find();
        return $model&&$model->$attr&&$model->$attr?$model->$attr:'';

    }

}