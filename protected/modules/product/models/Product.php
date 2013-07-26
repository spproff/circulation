<?php

class Product extends YModel
{
	public $tags;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{product}}';
	}

	public function rules()
	{
		return array(
			array('unit', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>255),
			array('article', 'length', 'max'=>64),
			array('active, booking', 'boolean', 'allowEmpty'=>false),
			array('price', 'type', 'type'=>'float'),
			array('description, url, tags', 'safe'),
			array('id, label, description, unit, url, article', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'tag'=>array(self::MANY_MANY, 'Tag',
				'calc_tag_product(product_id, tag_id)'),
		);
	}
	
	public function behaviors()
	{
		return array(
			'withRelated'=>array(
				'class'=>'application.components.WithRelatedBehavior',
			),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Label',
			'description' => 'Description',
			'unit' => 'Unit',
			'article' => 'Article',
			'url' => 'Url',
			'active' => 'Active',
			'booking' => 'Booking',
			'price' => 'Price',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('unit',$this->unit);
		$criteria->compare('article',$this->article);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function beforeRelatedSave() {
		if ($this->id)
			Yii::app()->db->createCommand()
				->delete(	'calc_tag_product', 
							'product_id=:id', 
							array(':id'=>$this->id));
		return parent::beforeSave();
	}
	
	public function save($runValidation=true,$attributes=null) {
		if ($this->tags) {
			$this->beforeRelatedSave();
			$criteria = new CDbCriteria();
			$criteria->addInCondition('id', $this->tags);
			$tag = Tag::model()->findAll($criteria);
			$this->tag = $tag;
			return $this->withRelated->save($runValidation, array('tag'));
		} else {
			return parent::save($runValidation,$attributes);
		}
	}
	
	public function afterFind() {
		$tags = array();
		if ($this->tag) {
			foreach ($this->tag as $item) {
				$tags[] = $item->id;
			}
		}
		$this->tags = $tags;
		parent::afterFind();
	}
}