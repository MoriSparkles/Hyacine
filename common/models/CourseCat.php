<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sm_course_cat".
 *
 * @property int $id
 * @property string $cat_name 课程类别名称
 */
class CourseCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_course_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name'], 'required'],
            [['cat_name'], 'string', 'max' => 169],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => '课程类别名称',
        ];
    }

    /**
     * 获取所有课程类别
     * @return array
     */
    public static function getAllCategories()
    {
        return self::find()->select(['id', 'cat_name'])->asArray()->all();
    }

    /**
     * 根据ID获取类别名称
     * @param int $id
     * @return string|null
     */
    public static function getNameById($id)
    {
        $cat = self::findOne($id);
        return $cat ? $cat->cat_name : null;
    }

    /**
     * 关联课程
     */
    public function getCourses()
    {
        return $this->hasMany(Course::class, ['course_category' => 'id']);
    }
} 