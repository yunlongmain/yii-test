<?php

/**
 * This is the model class for table "team".
 *
 * The followings are the available columns in table 'team':
 * @property string $id
 * @property string $contestId
 * @property string $name
 * @property string $teamDisplayId
 * @property string $description
 * @property string $appName
 * @property string $appDesc
 */
class Team extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contestId, name, teamDisplayId', 'required'),
			array('contestId, teamDisplayId', 'length', 'max'=>10),
			array('name', 'length', 'max'=>50),
			array('description, appName, appDesc', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, contestId, name, teamDisplayId, description, appName, appDesc', 'safe', 'on'=>'search'),
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
			'contestId' => 'Contest',
			'name' => 'Name',
			'teamDisplayId' => 'Team Display',
			'description' => 'Description',
			'appName' => 'App Name',
			'appDesc' => 'App Desc',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('contestId',$this->contestId,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('teamDisplayId',$this->teamDisplayId,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('appName',$this->appName,true);
		$criteria->compare('appDesc',$this->appDesc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Team the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
