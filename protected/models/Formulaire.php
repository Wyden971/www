<?php

/**
 * This is the model class for table "formulaire".
 *
 * The followings are the available columns in table 'formulaire':
 * @property integer $id
 * @property integer $Client_id
 * @property integer $A_pf1
 * @property integer $A_pf2
 * @property integer $A_pf3
 * @property integer $B_pf1
 * @property integer $B_pf2
 * @property integer $B_pf3
 *
 * The followings are the available model relations:
 * @property Client $client
 * @property PointForts $aPf1
 * @property PointForts $aPf2
 * @property PointForts $aPf3
 * @property PointForts $bPf1
 * @property PointForts $bPf2
 * @property PointForts $bPf3
 */
class Formulaire extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'formulaire';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Client_id, A_pf1, A_pf2, A_pf3, B_pf1, B_pf2, B_pf3', 'required'),
			array('Client_id, A_pf1, A_pf2, A_pf3, B_pf1, B_pf2, B_pf3', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Client_id, A_pf1, A_pf2, A_pf3, B_pf1, B_pf2, B_pf3', 'safe', 'on'=>'search'),
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
			'client' => array(self::BELONGS_TO, 'Client', 'Client_id'),
			'aPf1' => array(self::BELONGS_TO, 'PointForts', 'A_pf1'),
			'aPf2' => array(self::BELONGS_TO, 'PointForts', 'A_pf2'),
			'aPf3' => array(self::BELONGS_TO, 'PointForts', 'A_pf3'),
			'bPf1' => array(self::BELONGS_TO, 'PointForts', 'B_pf1'),
			'bPf2' => array(self::BELONGS_TO, 'PointForts', 'B_pf2'),
			'bPf3' => array(self::BELONGS_TO, 'PointForts', 'B_pf3'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Client_id' => 'Client',
			'A_pf1' => 'A Pf1',
			'A_pf2' => 'A Pf2',
			'A_pf3' => 'A Pf3',
			'B_pf1' => 'B Pf1',
			'B_pf2' => 'B Pf2',
			'B_pf3' => 'B Pf3',
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
		$criteria->compare('Client_id',$this->Client_id);
		$criteria->compare('A_pf1',$this->A_pf1);
		$criteria->compare('A_pf2',$this->A_pf2);
		$criteria->compare('A_pf3',$this->A_pf3);
		$criteria->compare('B_pf1',$this->B_pf1);
		$criteria->compare('B_pf2',$this->B_pf2);
		$criteria->compare('B_pf3',$this->B_pf3);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Formulaire the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
