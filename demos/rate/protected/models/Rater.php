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
        self::ROLE_NORMAL => '评委',
        self::ROLE_ADMIN=> '管理员',
        self::ROLE_SUPER_ADMIN => '超级管理员',
    );

    public static $ROLE_IN_RBAC = array(
        self::ROLE_NORMAL => 'rater',
        self::ROLE_ADMIN=> 'admin',
        self::ROLE_SUPER_ADMIN => 'super_admin',
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

    public function validatePassword($ps){
        return $ps === $this->password;//不加密
    }

    public function validateAuth(){
        return Yii::app()->authManager->checkAccess('admin',$this->id);
    }

    protected function beforeSave(){
        $assignments = Yii::app()->authManager->getAuthAssignments($this->id);
        if(count($assignments) > 1){
            throw new CException($this->name."has multiple auth!");
        }
        if(!isset($assignments[self::$ROLE_IN_RBAC[$this->role]]) ) {
            Yii::app()->authManager->assign(self::$ROLE_IN_RBAC[$this->role],$this->id);
            foreach($assignments as $k => $v){
                Yii::app()->authManager->revoke($k,$this->id);
            }
        }

        return parent::beforeSave();

    }
}
