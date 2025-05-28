<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yyxt_course_arrange".
 *
 * @property int $id
 * @property int $course_id
 * @property string|null $remarks
 * @property string $tutor_name
 * @property int|null $c_std_num
 * @property string|null $c_std_major
 * @property int $room_id
 * @property int $week_id
 * @property int $semester_id
 * @property int $c_day
 * @property int $c_day_time
 * @property string|null $tools
 */
class CourseArrange extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yyxt_course_arrange';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'tutor_name', 'room_id', 'week_id', 'semester_id', 'c_day', 'c_day_time'], 'required'],
            [['course_id', 'c_std_num', 'room_id', 'week_id', 'semester_id', 'c_day', 'c_day_time'], 'integer'],
            [['remarks', 'tools'], 'string', 'max' => 200],
            [['tutor_name'], 'string', 'max' => 100],
            [['c_std_major'], 'string', 'max' => 222],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => '课程ID',
            'remarks' => '备注',
            'tutor_name' => '教师姓名',
            'c_std_num' => '学生人数',
            'c_std_major' => '学生专业',
            'room_id' => '教室ID',
            'week_id' => '周次',
            'semester_id' => '学期ID',
            'c_day' => '星期',
            'c_day_time' => '节次',
            'tools' => '所需工具',
        ];
    }

    /**
     * 获取指定教室的所有课程安排
     * @param int $roomId
     * @return array
     */
    public static function getByRoom($roomId)
    {
        return self::find()->where(['room_id' => $roomId])->asArray()->all();
    }

    /**
     * 获取指定学期的所有课程安排
     * @param int $semesterId
     * @return array
     */
    public static function getBySemester($semesterId)
    {
        return self::find()->where(['semester_id' => $semesterId])->asArray()->all();
    }

    /**
     * 检查指定教室、时间段是否有课程安排（用于预约冲突检测）
     * @param int $roomId
     * @param int $weekId
     * @param int $cDay
     * @param int $cDayTime
     * @return bool
     */
    public static function isTimeSlotOccupied($roomId, $weekId, $cDay, $cDayTime)
    {
        return self::find()->where([
            'room_id' => $roomId,
            'week_id' => $weekId,
            'c_day' => $cDay,
            'c_day_time' => $cDayTime,
        ])->exists();
    }

    /**
     * 关联课程
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * 关联学期
     */
    public function getSemester()
    {
        return $this->hasOne(Semester::class, ['id' => 'semester_id']);
    }

    /**
     * 关联教室
     */
    public function getRoom()
    {
        return $this->hasOne(Room::class, ['id' => 'room_id']);
    }
} 