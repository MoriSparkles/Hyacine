<?php

use yii\db\Migration;
use common\models\User;

class m240315_000000_create_test_users extends Migration
{
    public function up()
    {
        // 创建管理员用户
        $admin = new User();
        $admin->username = 'admin';
        $admin->email = 'admin@example.com';
        $admin->setPassword('admin');
        $admin->generateAuthKey();
        $admin->status = User::STATUS_ACTIVE;
        $admin->save();

        // 创建导师用户
        $tutor = new User();
        $tutor->username = 'tutor';
        $tutor->email = 'tutor@example.com';
        $tutor->setPassword('tutor');
        $tutor->generateAuthKey();
        $tutor->status = User::STATUS_ACTIVE;
        $tutor->save();
    }

    public function down()
    {
        User::deleteAll(['username' => ['admin', 'tutor']]);
    }
} 