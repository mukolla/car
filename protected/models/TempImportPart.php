<?php

/**
 * This is the model class for table "{{temp_import_part}}".
 *
 * The followings are the available columns in table '{{temp_import_part}}':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $text
 * @property string $image
 * @property string $price
 * @property integer $is_active
 * @property integer $is_deleted
 * @property string $car_list
 */
class TempImportPart extends CActiveRecord
{
	private $category_list;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{temp_import_part}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id', 'required'),
			array('category_id, is_active, is_deleted', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>256),
			array('price', 'length', 'max'=>8),
			array('name, description, text, car_list', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, name, description, text, image, price, is_active, is_deleted, car_list', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'name' => 'Name',
			'description' => 'Description',
			'text' => 'Text',
			'image' => 'Image',
			'price' => 'Price',
			'is_active' => 'Is Active',
			'is_deleted' => 'Is Deleted',
			'car_list' => 'Car List',
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
        $this->category_list = Category::getCategoryList();

		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('car_list',$this->car_list,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TempImportPart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function getCategoryName()
    {
        $category_name = Category::model()->getCategoryNameById($this->category_id);
        if(strlen($category_name))
            return $category_name;

        return 'не определена';
    }
}
