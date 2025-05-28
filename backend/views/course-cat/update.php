<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CourseCat $model */

$this->title = 'Update Course Cat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-cat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
