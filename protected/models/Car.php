<?php

/**
 * This is the model class for table "{{car}}".
 *
 * The followings are the available columns in table '{{car}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $text
 * @property integer $fuel_type
 * @property string $year_start
 * @property string $year_end
 *
 * The followings are the available model relations:
 * @property PartCar[] $partCars
 */
class Car extends CActiveRecord
{
	const FUEL_TYPE_ALL = 0;
	const FUEL_TYPE_BENZINE = 1;
	const FUEL_TYPE_DIESEL = 2;

    public function getFuelTypeList()
    {
        return array(
            array(
                'id' => self::FUEL_TYPE_ALL,
                'name' => 'Любой'
            ),
            array(
                'id' => self::FUEL_TYPE_BENZINE,
                'name' => 'Бензин'
            ),
            array(
                'id' => self::FUEL_TYPE_DIESEL,
                'name' => 'Дизель'
            ),
        );
    }

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{car}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('name', 'required'),
            array('fuel_type', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>256),
			array('name, description, text, year_start, year_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, image, text, fuel_type, year_start, year_end', 'safe', 'on'=>'search'),
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
			'partCars' => array(self::HAS_MANY, 'PartCar', 'car_id'),
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
			'description' => 'Description',
			'image' => 'Image',
			'text' => 'Text',
			'fuel_type' => 'Fuel Type',
			'year_start' => 'Year Start',
			'year_end' => 'Year End',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('fuel_type',$this->fuel_type);
		$criteria->compare('year_start',$this->year_start,true);
		$criteria->compare('year_end',$this->year_end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Car the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function behaviors()
    {
        return array(
            'upload'=>array(
                'class'=>'application.components.FileUploadBehavior',
                'attribute'=>'image',
                'fileAlias'=>'webroot.upload.car',
                'types'=>'jpg, jpeg, png'
            )
        );
    }

    public static function getModelCarListByCategoryId($category_id, $car_id =null)
    {
        $car_list = Yii::app()->db->createCommand()
            ->select('c.id')
            ->from('{{part}} as p')
            ->leftJoin('{{part_car}} as pc', 'pc.part_id=p.id')
            ->leftJoin('{{car}} as c', 'c.id=pc.car_id')
            ->where('p.category_id=:category_id', array(':category_id'=>$category_id))
            ->group('c.id')
            ->queryColumn();

        $criteria = new CDbCriteria();

        if($car_id === null)
            $criteria->addInCondition('id',$car_list);

        $car_list = Car::model()->findAll($criteria);
        return $car_list;
    }
}
