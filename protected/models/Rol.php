<?php

/**
 * This is the model class for table "rol".
 *
 * The followings are the available columns in table 'rol':
 * @property integer $id_rol
 * @property string $name_rol
 *
 * The followings are the available model relations:
 * @property RolForm[] $rolForms
 * @property UserRol[] $userRols
 */
class Rol extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rol';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_rol, name_rol', 'required'),
			array('id_rol', 'numerical', 'integerOnly'=>true),
			array('name_rol', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rol, name_rol', 'safe', 'on'=>'search'),
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
			'rolForms' => array(self::HAS_MANY, 'RolForm', 'rol_id_rol'),
			'userRols' => array(self::HAS_MANY, 'UserRol', 'rol_id_rol'),
				'forms' => array(self::MANY_MANY, 'Form', 'rol_form(rol_id_rol, form_id_form)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rol' => 'Id Rol',
			'name_rol' => 'Name Rol',
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

		$criteria->compare('id_rol',$this->id_rol);
		$criteria->compare('name_rol',$this->name_rol,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Rol the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * Get the recent forms from the user id
	 * @param int rol id
	 * @return array the most recently added forms
	 */
	public function getRecentForms($id_rol) {
		return $this->with('forms')->findAll(array(
				'condition' => 't.id_rol=' . $id_rol,
		));
	}
}
