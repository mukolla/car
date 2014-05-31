<?php

/**
 * This is the model class for table "{{part}}".
 *
 * The followings are the available columns in table '{{part}}':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $text
 * @property string $image
 * @property string $price
 * @property integer $is_active
 * @property integer $is_deleted
 * @property array $car_list
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property PartCar[] $partCars
 */
class Part extends CActiveRecord
{
	protected $_fileAlias = 'webroot.upload.part';
    protected $filePatch = '/upload/part/';
    public $car_list;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{part}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, car_list, name', 'required'),
			array('category_id, is_active, is_deleted', 'numerical', 'integerOnly'=>true),
			array('image', 'length', 'max'=>256),
			array('price', 'length', 'max'=>32),
			array('name, description, text', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, name, description, text, image, price, is_active, is_deleted', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'partCars' => array(self::HAS_MANY, 'PartCar', 'part_id'),
            'cars'=>array(self::MANY_MANY, 'Car',
                'tbl_part_car(part_id, car_id)'),
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
			'car_list' => 'Список Автомобилей',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Part the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function afterSave()
    {
        parent::afterSave();
        PartCar::model()->addCarToPart($this->id,$this->car_list);
    }

    public function behaviors()
    {
        return array(
            'upload'=>array(
                'class'=>'application.components.FileUploadBehavior',
                'attribute'=>'image',
                'fileAlias'=> $this->_fileAlias,
                'types'=>'jpg, jpeg, png'
            )
        );
    }

    public function getImage($width,$height)
    {
        if (empty($this->image))
            return 'http://placehold.it/' . $width. 'x' . $height ;//return false;
        $dir = Yii::getPathOfAlias($this->_fileAlias).DIRECTORY_SEPARATOR;
        $name = $width.'_'.$height.'_'.$this->image;
        if (!file_exists($dir.$name)) {
            self::resizeImage($width, $height, $dir.$this->image, $dir.$name);
        }
        //return Yii::app()->baseUrl.'/upload/news/'.$name;
        return $this->filePatch . $name;
    }

    public static function resizeImage($width,$height,$scr,$dest)
    {
        $image = Yii::app()->image->load($scr);
        if($image->width > $width || $image->height > $height)
        {
            if (($image->width/$width) < ($image->height/$height))
                $image->resize($width, null, Image::AUTO);
            else
                $image->resize(null, $height, Image::AUTO);
        }
        $image->crop($width, $height, 'center', 'center');
        $image->save($dest);
    }

    public static function getPartListByCarId($car_id)
    {
        $part_list = Yii::app()->db->createCommand()
            ->select('p.id')
            ->from('{{part}} as p')
            ->leftJoin('{{part_car}} as pc', 'pc.part_id=p.id')
            ->leftJoin('{{car}} as c', 'c.id=pc.car_id')
            ->where('pc.car_id=:car_id', array(':car_id'=>$car_id))
            ->group('p.id')
            ->queryColumn();
        return $part_list;
    }
}
