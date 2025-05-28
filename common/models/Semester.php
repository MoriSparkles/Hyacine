<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "semester".
 *
 * @property int $id
 * @property string $s_name 学期名称
 * @property string|null $first_day 开学日期
 * @property int $current_s 是否当前学期
 */
class Semester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['s_name'], 'required'],
            [['first_day'], 'safe'],
            [['current_s'], 'integer'],
            [['s_name'], 'string', 'max' => 333],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            's_name' => '学期名称',
            'first_day' => '开学日期',
            'current_s' => '是否当前学期',
        ];
    }

    /**
     * 获取当前学期
     * @return Semester|null
     */
    public static function getCurrentSemester()
    {
        return self::findOne(['current_s' => 1]);
    }

    /**
     * 获取所有学期列表
     * @return array
     */
    public static function getSemesterList()
    {
        return self::find()
            ->select(['id', 's_name'])
            ->orderBy(['first_day' => SORT_DESC])
            ->asArray()
            ->all();
    }

    /**
     * 关联课程安排
     */
    public function getCourseArranges()
    {
        return $this->hasMany(CourseArrange::class, ['semester_id' => 'id']);
    }
} 