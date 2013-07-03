<?php

class Income extends YModel
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{income}}';
	}

	public function rules()
	{
		return array(
			array('product_id, amount, supplier_id', 'numerical', 'integerOnly'=>true),
			array('price, exchange', 'numerical'),
			array('date', 'safe'),
			array('id, date, product_id, amount, price, exchange, supplier_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'supplier'=>array(self::BELONGS_TO, 'Supplier', 'supplier_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'product_id' => 'Product',
			'amount' => 'Amount',
			'price' => 'Price',
			'exchange' => 'Exchange',
			'supplier_id' => 'Supplier',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('price',$this->price);
		$criteria->compare('exchange',$this->exchange);
		$criteria->compare('supplier_id',$this->supplier_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}