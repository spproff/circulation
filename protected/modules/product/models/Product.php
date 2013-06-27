<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $label
 * @property string $description
 * @property string $images
 * @property integer $supplier_id
 * @property integer $unit
 * @property string $url
 */
class Product extends YModel
{
	public $tags;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supplier_id, unit', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>255),
			array('article', 'length', 'max'=>64),
			array('description, images, url, tags', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, label, description, images, supplier_id, unit, url, article', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Label',
			'description' => 'Description',
			'images' => 'Images',
			'supplier_id' => 'Supplier',
			'unit' => 'Unit',
			'article' => 'Article',
			'url' => 'Url',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('supplier_id',$this->supplier_id);
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
			$tags = Tag::model()->findAll($criteria);
			$this->tags = $tags;
			$this->withRelated->save($runValidation, array('tag'));
		} else {
			parent::save($runValidation,$attributes);
		}
	}
}