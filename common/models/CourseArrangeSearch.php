<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseArrange;

/**
 * CourseArrangeSearch represents the model behind the search form of `common\models\CourseArrange`.
 */
class CourseArrangeSearch extends CourseArrange
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'c_std_num', 'room_id', 'week_id', 'semester_id', 'c_day', 'c_day_time'], 'integer'],
            [['remarks', 'tutor_name', 'c_std_major', 'tools'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = CourseArrange::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'course_id' => $this->course_id,
            'c_std_num' => $this->c_std_num,
            'room_id' => $this->room_id,
            'week_id' => $this->week_id,
            'semester_id' => $this->semester_id,
            'c_day' => $this->c_day,
            'c_day_time' => $this->c_day_time,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'tutor_name', $this->tutor_name])
            ->andFilterWhere(['like', 'c_std_major', $this->c_std_major])
            ->andFilterWhere(['like', 'tools', $this->tools]);

        return $dataProvider;
    }
}
