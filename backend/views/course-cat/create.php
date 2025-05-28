<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CourseCat $model */

$this->title = 'Create Course Cat';
$this->params['breadcrumbs'][] = ['label' => 'Course Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
