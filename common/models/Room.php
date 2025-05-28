<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string $room_name 教室名称
 * @property int $capacity 容纳人数
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yyxt_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_name', 'capacity'], 'required'],
            [['capacity'], 'integer'],
            [['room_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_name' => '教室名称',
            'capacity' => '容纳人数',
        ];
    }

    /**
     * 关联课程安排
     */
    public function getCourseArranges()
    {
        return $this->hasMany(CourseArrange::class, ['room_id' => 'id']);
    }
} 