<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CourseArrange $model */

$this->title = 'Create Course Arrange';
$this->params['breadcrumbs'][] = ['label' => 'Course Arranges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-arrange-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
