<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sm_course".
 *
 * @property int $id
 * @property string $course_name 课程名称
 * @property string $course_duration 课程时长
 * @property int $course_category 课程类别
 * @property string|null $remarks 备注
 * @property string $created 创建时间
 * @property string $modified 修改时间
 * @property int $status 状态
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_name', 'course_duration', 'course_category'], 'required'],
            [['course_category', 'status'], 'integer'],
            [['remarks'], 'string'],
            [['created', 'modified'], 'safe'],
            [['course_name'], 'string', 'max' => 255],
            [['course_duration'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => '课程名称',
            'course_duration' => '课程时长',
            'course_category' => '课程类别',
            'remarks' => '备注',
            'created' => '创建时间',
            'modified' => '修改时间',
            'status' => '状态',
        ];
    }

    /**
     * 获取课程列表
     * @param bool $activeOnly 是否只获取激活的课程
     * @return array
     */
    public static function getCourseList($activeOnly = true)
    {
        $query = self::find()
            ->select(['id', 'course_name', 'course_duration', 'course_category'])
            ->orderBy(['course_name' => SORT_ASC]);
            
        if ($activeOnly) {
            $query->where(['status' => 1]);
        }
        
        return $query->asArray()->all();
    }

    /**
     * 获取课程类别列表
     * @return array
     */
    public static function getCourseCategories()
    {
        return [
            1 => '本科课程',
            2 => '硕士课程',
            3 => '博士课程',
            4 => 'MBA课程',
            5 => 'EMBA课程',
        ];
    }

    /**
     * 获取课程类别名称
     * @return string
     */
    public function getCategoryName()
    {
        $categories = self::getCourseCategories();
        return isset($categories[$this->course_category]) ? $categories[$this->course_category] : '未知';
    }

    /**
     * 关联课程类别
     */
    public function getCategory()
    {
        return $this->hasOne(CourseCat::class, ['id' => 'course_category']);
    }
} 