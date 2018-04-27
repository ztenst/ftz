<?php

/**
 * This is the model class for table "xing".
 *
 * The followings are the available columns in table 'xing':
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $py
 * @property string $content
 * @property integer $week_hits
 * @property integer $hits
 * @property integer $created
 * @property integer $updated
 */
class Xing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'xing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created', 'required'),
			array('week_hits, hits, created, updated', 'numerical', 'integerOnly'=>true),
			array('name, title, py', 'length', 'max'=>100),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, title, py, content, week_hits, hits, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'title' => 'Title',
			'py' => 'Py',
			'content' => 'Content',
			'week_hits' => 'Week Hits',
			'hits' => 'Hits',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('py',$this->py,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('week_hits',$this->week_hits);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Xing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
