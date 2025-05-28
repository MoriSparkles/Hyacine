<?php

use yii\db\Migration;
use common\models\User;

class m240315_000001_reset_admin_password extends Migration
{
    public function up()
    {
        // 重置管理员密码
        $admin = User::findByUsername('admin');
        if ($admin) {
            $admin->setPassword('admin');
            $admin->generateAuthKey();
            $admin->status = User::STATUS_ACTIVE;
            $admin->save();
        }
    }

    public function down()
    {
        // 无法回滚密码重置
    }
} 