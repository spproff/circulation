<?php

/**
 * This is the model class for table "{{outcome}}".
 *
 * The followings are the available columns in table '{{outcome}}':
 * @property integer $id
 * @property string $date
 * @property integer $product_id
 * @property integer $amount
 * @property double $price
 * @property string $client
 */
class Outcome extends YModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Outcome the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{outcome}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, amount', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('date, client', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, product_id, amount, price, client', 'safe', 'on'=>'search'),
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
			'date' => 'Date',
			'product_id' => 'Product',
			'amount' => 'Amount',
			'price' => 'Price',
			'client' => 'Client',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('price',$this->price);
		$criteria->compare('client',$this->client,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}