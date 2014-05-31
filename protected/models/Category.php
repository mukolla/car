<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Part[] $parts
 */
class Category extends CActiveRecord
{
    protected $_fileAlias = 'webroot.upload.category';
    protected $filePatch = '/upload/category/';

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
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
            array('image', 'length', 'max'=>256),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, image', 'safe', 'on'=>'search'),
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
			'parts' => array(self::HAS_MANY, 'Part', 'category_id'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
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
                'fileAlias'=>$this->_fileAlias,
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
}
