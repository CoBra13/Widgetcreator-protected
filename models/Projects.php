<?php

/**
 * This is the model class for table "tbl_projects".
 *
 * The followings are the available columns in table 'tbl_projects':
 * @property string $id
 * @property string $name
 * @property string $groupcount
 * @property string $poscount
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property TblGroups[] $tblGroups
 * @property TblUser $user
 */
class Projects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, groupcount, poscount, user_id', 'required'),
			array('name', 'length', 'max'=>128),
			array('groupcount, poscount, user_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, groupcount, poscount, user_id', 'safe', 'on'=>'search'),
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
			'tblGroups' => array(self::HAS_MANY, 'TblGroups', 'project_id'),
			'user' => array(self::BELONGS_TO, 'TblUser', 'user_id'),
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
			'groupcount' => 'Groupcount',
			'poscount' => 'Poscount',
			'user_id' => 'User',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('groupcount',$this->groupcount,true);
		$criteria->compare('poscount',$this->poscount,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}