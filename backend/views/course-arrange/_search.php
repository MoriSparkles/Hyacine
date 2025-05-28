<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CourseArrangeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="course-arrange-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'remarks') ?>

    <?= $form->field($model, 'tutor_name') ?>

    <?= $form->field($model, 'c_std_num') ?>

    <?php // echo $form->field($model, 'c_std_major') ?>

    <?php // echo $form->field($model, 'room_id') ?>

    <?php // echo $form->field($model, 'week_id') ?>

    <?php // echo $form->field($model, 'semester_id') ?>

    <?php // echo $form->field($model, 'c_day') ?>

    <?php // echo $form->field($model, 'c_day_time') ?>

    <?php // echo $form->field($model, 'tools') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
