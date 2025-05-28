<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Department]].
 *
 * @see Department
 */
class DepartmentQuery extends \yii\db\ActiveQuery
{
    /**
     * 按学院ID筛选
     * @param int $collegeId
     * @return $this
     */
    public function byCollege($collegeId)
    {
        return $this->andWhere(['college_id' => $collegeId]);
    }

    /**
     * 按排序升序
     * @return $this
     */
    public function ordered()
    {
        return $this->orderBy(['dept_order' => SORT_ASC]);
    }

    /**
     * 获取有效的部门
     * @return $this
     */
    public function active()
    {
        return $this->andWhere(['>', 'id', 0]);
    }

    /**
     * {@inheritdoc}
     * @return Department[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Department|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
