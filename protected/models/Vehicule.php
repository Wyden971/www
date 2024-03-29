<?php

/**
 * This is the model class for table "vehicule".
 *
 * The followings are the available columns in table 'vehicule':
 * @property integer $id
 * @property string $modele
 * @property integer $age
 * @property integer $marque_id
 * @property integer $type_id
 *
 * The followings are the available model relations:
 * @property Client[] $clients
 * @property PfInt[] $pfInts
 * @property Marque $marque
 * @property Type $type
 */
class Vehicule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('marque_id, type_id', 'required'),
			array('age, marque_id, type_id', 'numerical', 'integerOnly'=>true),
			array('modele', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modele, age, marque_id, type_id', 'safe', 'on'=>'search'),
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
			'clients' => array(self::HAS_MANY, 'Client', 'vehicule_id'),
			'pfInts' => array(self::HAS_MANY, 'PfInt', 'vehicule_id'),
			'marque' => array(self::BELONGS_TO, 'Marque', 'marque_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'modele' => 'Modele',
			'age' => 'Age',
			'marque_id' => 'Marque',
			'type_id' => 'Type',
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
		$criteria->compare('modele',$this->modele,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('marque_id',$this->marque_id);
		$criteria->compare('type_id',$this->type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehicule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
