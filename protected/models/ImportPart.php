<?php

/**
 * This is the model class for table "{{import_part}}".
 *
 * The followings are the available columns in table '{{import_part}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $file
 * @property integer $user_id
 * @property string $date_create
 * @property string $date_update
 */
class ImportPart extends CActiveRecord
{
    const FILE_IMPORT_PATH = 'webroot.upload.import';
    protected $_fileAlias = self::FILE_IMPORT_PATH;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{import_part}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, date_create, date_update', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, file, user_id, date_create, date_update', 'safe', 'on'=>'search'),
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
			'name' => 'Название',
			'description' => 'Описание',
			'file' => 'Файл',
			'user_id' => 'Пользователь',
			'date_create' => 'Дата импорта',
			'date_update' => 'Дата редактирования',
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
		$criteria->compare('file',$this->file,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_update',$this->date_update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImportPart the static model class
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
                'attribute'=>'file',
                'fileAlias'=> $this->_fileAlias,
                'types'=>'csv'
            ),
        );
    }

    protected function beforeValidate()
    {
        if(parent::beforeValidate())
        {
            if($this->isNewRecord)
            {
                $this->user_id = Yii::app()->user->id;
                $this->date_create = Yii::app()->getLocale(Yii::app()->language == 'ua' ? 'uk' : Yii::app()->language)->dateFormatter->format('yyyy-MM-dd HH:mm:ss',  time() );
                $this->date_update = $this->date_create;
            }
            else
                $this->date_update = Yii::app()->getLocale(Yii::app()->language == 'ua' ? 'uk' : Yii::app()->language)->dateFormatter->format('yyyy-MM-dd HH:mm:ss',  time() );
            return true;
        }
        else
            return false;
    }

}
