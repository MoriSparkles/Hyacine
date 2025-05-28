<?php

/** @var yii\web\View $this */
/** @var array $recentArranges */
/** @var array $currentArranges */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '教室预约系统';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">欢迎使用教室预约系统</h1>
        <p class="lead">高效管理教室资源，便捷安排课程教学</p>
    </div>

    <div class="body-content">
        <!-- 统计卡片 -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">课程总数</h5>
                        <p class="card-text display-4"><?= $courseCount ?></p>
                        <a href="<?= Url::to(['/course/index']) ?>" class="btn btn-light">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">教室总数</h5>
                        <p class="card-text display-4"><?= $roomCount ?></p>
                        <a href="<?= Url::to(['/room/index']) ?>" class="btn btn-light">查看详情</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">课程安排</h5>
                        <p class="card-text display-4"><?= $courseArrangeCount ?></p>
                        <a href="<?= Url::to(['/course-arrange/index']) ?>" class="btn btn-light">查看详情</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 功能入口 -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h2>功能导航</h2>
                <div class="list-group">
                    <a href="<?= Url::to(['/course/index']) ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">课程管理</h5>
                            <small>管理课程信息</small>
                        </div>
                        <p class="mb-1">添加、编辑和删除课程信息，设置课程分类。</p>
                    </a>
                    <a href="<?= Url::to(['/course-cat/index']) ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">课程分类</h5>
                            <small>管理课程分类</small>
                        </div>
                        <p class="mb-1">管理课程分类信息，方便课程归类。</p>
                    </a>
                    <a href="<?= Url::to(['/course-arrange/index']) ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">课程安排</h5>
                            <small>安排课程时间地点</small>
                        </div>
                        <p class="mb-1">安排课程的具体时间和教室。</p>
                    </a>
                    <a href="<?= Url::to(['/room/index']) ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">教室管理</h5>
                            <small>管理教室信息</small>
                        </div>
                        <p class="mb-1">管理教室信息，包括容量、设备等。</p>
                    </a>
                    <a href="<?= Url::to(['/semester/index']) ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">学期管理</h5>
                            <small>管理学期信息</small>
                        </div>
                        <p class="mb-1">管理学期信息，设置当前学期。</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- 最近课程安排 -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">最近课程安排</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <?php foreach ($recentArranges as $arrange): ?>
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1"><?= Html::encode($arrange->course->course_name ?? '未知课程') ?></h6>
                                        <small>ID: <?= $arrange->id ?></small>
                                    </div>
                                    <p class="mb-1">
                                        教室：<?= Html::encode($arrange->room->room_name ?? '未知教室') ?><br>
                                        教师：<?= Html::encode($arrange->tutor_name) ?><br>
                                        时间：星期<?= ['一','二','三','四','五','六','日'][$arrange->c_day-1] ?> 第<?= $arrange->c_day_time ?>节
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">当前学期课程安排</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <?php foreach ($currentArranges as $arrange): ?>
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1"><?= Html::encode($arrange->course->course_name ?? '未知课程') ?></h6>
                                        <small>ID: <?= $arrange->id ?></small>
                                    </div>
                                    <p class="mb-1">
                                        教室：<?= Html::encode($arrange->room->room_name ?? '未知教室') ?><br>
                                        教师：<?= Html::encode($arrange->tutor_name) ?><br>
                                        时间：星期<?= ['一','二','三','四','五','六','日'][$arrange->c_day-1] ?> 第<?= $arrange->c_day_time ?>节
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
