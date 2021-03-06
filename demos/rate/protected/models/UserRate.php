<?php

/**
 * This is the model class for table "user_rate".
 *
 * The followings are the available columns in table 'user_rate':
 * @property string $teamId
 * @property string $contestId
 * @property string $raterId
 * @property string $rateDetail
 * @property integer $score
 * @property integer $valid
 * @property string $ctime
 * @property string $utime
 */
class UserRate extends CActiveRecord
{

    private $rateDetailDesc;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_rate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teamId, contestId, raterId, score, ctime', 'required'),
			array('score, valid', 'numerical', 'integerOnly'=>true),
			array('teamId, contestId, raterId', 'length', 'max'=>10),
			array('rateDetail', 'length', 'max'=>255),
			array('utime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('teamId, contestId, raterId, rateDetail, score, valid, ctime, utime', 'safe', 'on'=>'search'),
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
			'teamId' => 'Team',
			'contestId' => 'Contest',
			'raterId' => 'Rater',
			'rateDetail' => 'Rate Detail',
			'score' => 'Score',
			'valid' => 'Valid',
			'ctime' => 'Ctime',
			'utime' => 'Utime',
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

		$criteria->compare('teamId',$this->teamId);
		$criteria->compare('contestId',$this->contestId);
		$criteria->compare('raterId',$this->raterId);
		$criteria->compare('rateDetail',$this->rateDetail,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('valid',$this->valid);
		$criteria->compare('ctime',$this->ctime,true);
		$criteria->compare('utime',$this->utime,true);

		return new CActiveDataProvider($this, array(
            'pagination'=>array(
                'pageSize'=>Yii::app()->params['ratePerPage'],
            ),
            'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserRate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function afterFind()
    {
        $rateDetail = json_decode($this->rateDetail);

        $this->rateDetailDesc = "";
        foreach($rateDetail as $k => $v) {
            $this->rateDetailDesc .= Rate::getItem($k)->name.":".$v." ";
        }

        parent::afterFind();
    }

    public function getRateDetailDesc()
    {
        return $this->rateDetailDesc;
    }

    public function setRateDetailDesc($var)
    {
        $this->rateDetailDesc = $var;
    }
}
