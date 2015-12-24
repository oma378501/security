<?php

/**
 * This is the model class for table "rol_form".
 *
 * The followings are the available columns in table 'rol_form':
 * @property integer $id_rol_form
 * @property integer $rol_id_rol
 * @property integer $form_id_form
 *
 * The followings are the available model relations:
 * @property Rol $rolIdRol
 * @property Form $formIdForm
 */
class RolForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rol_form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol_id_rol, form_id_form', 'required'),
			array('rol_id_rol, form_id_form', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_rol_form, rol_id_rol, form_id_form', 'safe', 'on'=>'search'),
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
			'rolIdRol' => array(self::BELONGS_TO, 'Rol', 'rol_id_rol'),
			'formIdForm' => array(self::BELONGS_TO, 'Form', 'form_id_form'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_rol_form' => 'Id Rol Form',
			'rol_id_rol' => 'Rol Id Rol',
			'form_id_form' => 'Form Id Form',
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

		$criteria->compare('id_rol_form',$this->id_rol_form);
		$criteria->compare('rol_id_rol',$this->rol_id_rol);
		$criteria->compare('form_id_form',$this->form_id_form);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RolForm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
