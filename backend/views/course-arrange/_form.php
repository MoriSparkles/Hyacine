<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CourseArrange $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="course-arrange-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tutor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_std_num')->textInput() ?>

    <?= $form->field($model, 'c_std_major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'room_id')->textInput() ?>

    <?= $form->field($model, 'week_id')->textInput() ?>

    <?= $form->field($model, 'semester_id')->textInput() ?>

    <?= $form->field($model, 'c_day')->textInput() ?>

    <?= $form->field($model, 'c_day_time')->textInput() ?>

    <?= $form->field($model, 'tools')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
