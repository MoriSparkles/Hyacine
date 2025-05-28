<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\Course;
use common\models\CourseCat;
use common\models\CourseArrange;
use common\models\Room;
use common\models\Semester;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // 获取统计数据
        $courseCount = Course::find()->count();
        $courseCatCount = CourseCat::find()->count();
        $courseArrangeCount = CourseArrange::find()->count();
        $roomCount = Room::find()->count();
        $semesterCount = Semester::find()->count();

        // 获取最近的课程安排
        $recentArranges = CourseArrange::find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(5)
            ->all();

        // 获取当前学期的课程安排
        $currentSemester = Semester::findOne(['current_s' => 1]);
        $currentArranges = [];
        if ($currentSemester) {
            $currentArranges = CourseArrange::find()
                ->where(['semester_id' => $currentSemester->id])
                ->orderBy(['id' => SORT_DESC])
                ->limit(5)
                ->all();
        }

        return $this->render('index', [
            'courseCount' => $courseCount,
            'courseCatCount' => $courseCatCount,
            'courseArrangeCount' => $courseArrangeCount,
            'roomCount' => $roomCount,
            'semesterCount' => $semesterCount,
            'recentArranges' => $recentArranges,
            'currentArranges' => $currentArranges,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
