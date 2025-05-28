<?php

use common\models\CourseArrange;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CourseArrangeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Course Arranges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-arrange-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Course Arrange', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'course_id',
            'remarks',
            'tutor_name',
            'c_std_num',
            //'c_std_major',
            //'room_id',
            //'week_id',
            //'semester_id',
            //'c_day',
            //'c_day_time:datetime',
            //'tools',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CourseArrange $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
