<?php

/**
 * This is the model class for table "user_rol".
 *
 * The followings are the available columns in table 'user_rol':
 * @property integer $id_user_rol
 * @property integer $rol_id_rol
 * @property integer $user_id_user
 *
 * The followings are the available model relations:
 * @property Rol $rolIdRol
 * @property User $userIdUser
 */
class UserRol extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_rol';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol_id_rol, user_id_user', 'required'),
			array('rol_id_rol, user_id_user', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user_rol, rol_id_rol, user_id_user', 'safe', 'on'=>'search'),
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
			'userIdUser' => array(self::BELONGS_TO, 'User', 'user_id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user_rol' => 'Id User Rol',
			'rol_id_rol' => 'Rol Id Rol',
			'user_id_user' => 'User Id User',
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

		$criteria->compare('id_user_rol',$this->id_user_rol);
		$criteria->compare('rol_id_rol',$this->rol_id_rol);
		$criteria->compare('user_id_user',$this->user_id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserRol the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
