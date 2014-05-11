<?php

/**
 * This is the model class for table "tbl_groups".
 *
 * The followings are the available columns in table 'tbl_groups':
 * @property string $id
 * @property string $project_id
 * @property string $group_nr
 * @property string $group_name
 *
 * The followings are the available model relations:
 * @property TblProjects $project
 * @property TblMilestone[] $tblMilestones
 * @property TblRating[] $tblRatings
 */
class Groups extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Groups the static model class
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
		return 'tbl_groups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, group_nr', 'required'),
			array('project_id, group_nr', 'length', 'max'=>10),
			array('group_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, group_nr, group_name', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'TblProjects', 'project_id'),
			'tblMilestones' => array(self::HAS_MANY, 'TblMilestone', 'group_id'),
			'tblRatings' => array(self::HAS_MANY, 'TblRating', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'project_id' => 'Project',
			'group_nr' => 'Group Nr',
			'group_name' => 'Group Name',
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
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('group_nr',$this->group_nr,true);
		$criteria->compare('group_name',$this->group_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}