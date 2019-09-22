<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id 菜单 ID
 * @property int $parent_id 父级
 * @property string $name 名称
 * @property string $icon 图标
 * @property int $child 有子级
 * @property string $parent_arr 父级链
 * @property string $child_arr 子级群
 * @property string $controller 控制器
 * @property string $action 方法
 * @property string $params 参数
 * @property string $auth_item 权限
 * @property string $sort 排序
 * @property int $status 状态
 */
class Menu extends namespace\base\Menu
{

    const STATUS_DELETE = 0;    // 删除
    const STATUS_UNACTIVE = 1;  // 禁用
    const STATUS_ACTIVE = 9;    // 启用

}
