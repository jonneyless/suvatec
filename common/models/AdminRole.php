<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%admin_role}}".
 *
 * @property string $id 角色 ID
 * @property string $name 名称
 * @property string $description 说明
 * @property string $auth 权限
 * @property string $route 路由
 * @property int $status 状态
 */
class AdminRole extends namespace\base\AdminRole
{

    const STATUS_DELETE = 0;    // 删除
    const STATUS_UNACTIVE = 1;  // 禁用
    const STATUS_ACTIVE = 9;    // 启用

}
