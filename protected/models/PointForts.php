<?php

/**
 * This is the model class for table "point_forts".
 *
 * The followings are the available columns in table 'point_forts':
 * @property integer $id
 * @property string $nom
 *
 * The followings are the available model relations:
 * @property Formulaire[] $formulaires
 * @property Formulaire[] $formulaires1
 * @property Formulaire[] $formulaires2
 * @property Formulaire[] $formulaires3
 * @property Formulaire[] $formulaires4
 * @property Formulaire[] $formulaires5
 * @property PfInt[] $pfInts
 */
class PointForts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'point_forts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nom', 'safe', 'on'=>'search'),
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
			'formulaires' => array(self::HAS_MANY, 'Formulaire', 'A_pf1'),
			'formulaires1' => array(self::HAS_MANY, 'Formulaire', 'A_pf2'),
			'formulaires2' => array(self::HAS_MANY, 'Formulaire', 'A_pf3'),
			'formulaires3' => array(self::HAS_MANY, 'Formulaire', 'B_pf1'),
			'formulaires4' => array(self::HAS_MANY, 'Formulaire', 'B_pf2'),
			'formulaires5' => array(self::HAS_MANY, 'Formulaire', 'B_pf3'),
			'pfInts' => array(self::HAS_MANY, 'PfInt', 'point_forts_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nom' => 'Nom',
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
		$criteria->compare('nom',$this->nom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PointForts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
