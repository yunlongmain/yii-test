<?php

/**
 * This is the model class for table "rater".
 *
 * The followings are the available columns in table 'rater':
 * @property string $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property string $contestAuth
 * @property string $description
 */
class Rater extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rater';
	}

    const ROLE_NORMAL = 0;
    const ROLE_ADMIN = 1;
    const ROLE_SUPER_ADMIN = 2;

    public static $ROLE_DESC = array(
        '0' => '评委',
        '1' => '管理员',
        '2' => '超级管理员',
    );

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, contestAuth', 'required'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('name, username, password', 'length', 'max'=>50),
			array('contestAuth', 'length', 'max'=>11),
			array('description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, username, password, role, contestAuth, description', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'role' => 'Role',
			'contestAuth' => 'Contest Auth',
			'description' => 'Description',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('contestAuth',$this->contestAuth,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rater the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
