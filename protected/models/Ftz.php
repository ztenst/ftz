<?php

/**
 * This is the model class for table "ftz".
 *
 * The followings are the available columns in table 'ftz':
 * @property integer $id
 * @property string $jtz
 * @property string $ftz1
 * @property string $ftz2
 * @property string $ftz3
 * @property string $ftz4
 * @property string $ftz5
 * @property string $ftz6
 * @property integer $level
 * @property string $correct
 * @property integer $status
 * @property integer $created
 * @property integer $updated
 */
class Ftz extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ftz';
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
			array('level, status, created, updated', 'numerical', 'integerOnly'=>true),
			array('jtz, ftz1, ftz2, ftz3, ftz4, ftz5, ftz6, correct', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, jtz, ftz1, ftz2, ftz3, ftz4, ftz5, ftz6, level, correct, status, created, updated', 'safe', 'on'=>'search'),
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
			'jtz' => 'Jtz',
			'ftz1' => 'Ftz1',
			'ftz2' => 'Ftz2',
			'ftz3' => 'Ftz3',
			'ftz4' => 'Ftz4',
			'ftz5' => 'Ftz5',
			'ftz6' => 'Ftz6',
			'level' => 'Level',
			'correct' => 'Correct',
			'status' => 'Status',
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
		$criteria->compare('jtz',$this->jtz,true);
		$criteria->compare('ftz1',$this->ftz1,true);
		$criteria->compare('ftz2',$this->ftz2,true);
		$criteria->compare('ftz3',$this->ftz3,true);
		$criteria->compare('ftz4',$this->ftz4,true);
		$criteria->compare('ftz5',$this->ftz5,true);
		$criteria->compare('ftz6',$this->ftz6,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('correct',$this->correct,true);
		$criteria->compare('status',$this->status);
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
	 * @return Ftz the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
