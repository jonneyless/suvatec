<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property string $id 用户 ID
 * @property string $role_id 角色 ID
 * @property string $username 用户名
 * @property string $password_hash 登录密码
 * @property string $auth_key 登录保持密钥
 * @property int $created_at 注册时间
 * @property int $updated_at 更新时间
 * @property int $signin_at 登录时间
 * @property int $status 状态
 */
class Admin extends namespace\base\Admin
{

    const STATUS_DELETE = 0;    // 删除
    const STATUS_UNACTIVE = 1;  // 禁用
    const STATUS_ACTIVE = 9;    // 启用

}
