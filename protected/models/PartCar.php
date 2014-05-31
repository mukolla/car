<?php

/**
 * This is the model class for table "{{part_car}}".
 *
 * The followings are the available columns in table '{{part_car}}':
 * @property integer $part_id
 * @property integer $car_id
 *
 * The followings are the available model relations:
 * @property Car $car
 * @property Part $part
 */
class PartCar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{part_car}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('part_id, car_id', 'required'),
			array('part_id, car_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('part_id, car_id', 'safe', 'on'=>'search'),
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
			'car' => array(self::BELONGS_TO, 'Car', 'car_id'),
			'part' => array(self::BELONGS_TO, 'Part', 'part_id'),
            'parts'=>array(self::MANY_MANY, 'Part',
                'tbl_part_car(part_id, car_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'part_id' => 'Part',
			'car_id' => 'Car',
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

		$criteria->compare('part_id',$this->part_id);
		$criteria->compare('car_id',$this->car_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PartCar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function addCarToPart($part_id, $car_list)
    {
        self::model()->deleteAll('part_id=:part_id',array(':part_id'=>$part_id));
        foreach ($car_list as $car_id) {
            $part_car = new self;
            $part_car->car_id = $car_id;
            $part_car->part_id = $part_id;
            $part_car->save();
        }
    }

    public function loadCar($part_id)
    {
        $criteria = new CDbCriteria();
        $criteria->select = array('car_id');
        $criteria->addCondition('part_id=:part_id');
        $criteria->params = array(':part_id'=>$part_id);

        $car_list = self::model()->findAll($criteria);
        $result = array();
        foreach ($car_list as $car) {
            $result[] = $car->car_id;
        }

        return $result;
    }
}
