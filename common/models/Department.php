<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string|null $dept_code 部门代码
 * @property string $department_name 部门名称
 * @property int $college_id 所属学院ID
 * @property int|null $dept_order 排序
 * 
 * @property College $college 所属学院
 */
class Department extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dept_order'], 'default', 'value' => null],
            [['department_name'], 'default', 'value' => ''],
            [['college_id'], 'default', 'value' => 1],
            [['college_id', 'dept_order'], 'integer'],
            [['dept_code', 'department_name'], 'string', 'max' => 20],
            [['college_id'], 'exist', 'skipOnError' => true, 'targetClass' => College::class, 'targetAttribute' => ['college_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dept_code' => '部门代码',
            'department_name' => '部门名称',
            'college_id' => '所属学院',
            'dept_order' => '排序',
        ];
    }

    /**
     * 获取所属学院
     * @return \yii\db\ActiveQuery
     */
    public function getCollege()
    {
        return $this->hasOne(College::class, ['id' => 'college_id']);
    }

    /**
     * {@inheritdoc}
     * @return DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentQuery(get_called_class());
    }

    /**
     * 获取所有部门列表
     * @return array
     */
    public static function getDepartmentList()
    {
        return self::find()
            ->select(['id', 'department_name'])
            ->orderBy(['dept_order' => SORT_ASC])
            ->asArray()
            ->all();
    }

}
