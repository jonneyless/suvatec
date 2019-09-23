<?php

use admin\models\Menu;
use yii\db\Migration;

/**
 * import init data
 */
class m190923_233400_menu extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $model = new Menu();
        $model->parent_id = 0;
        $model->name = '产品';
        $model->icon = 'cubes';
        $model->save();

        $child = new Menu();
        $child->parent_id = $model->id;
        $child->name = '产品管理';
        $child->icon = '';
        $child->controller = 'product';
        $child->save();

        $child = new Menu();
        $child->parent_id = $model->id;
        $child->name = '分类管理';
        $child->icon = '';
        $child->controller = 'category';
        $child->save();
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->truncateTable('{{%menu}}');

        $this->execute("INSERT INTO `menu` (`id`, `parent_id`, `name`, `icon`, `child`, `parent_arr`, `child_arr`, `controller`, `action`, `params`, `auth_item`, `sort`, `status`) VALUES
(1, 0, '仪表盘', 'dashboard', 0, '0', '1', 'site', 'index', '', '', 0, 9),
(2, 0, '系统', 'cog', 1, '0', '2,3,4,5', '', '', '', '', 0, 9),
(3, 2, '角色', '', 0, '0,2', '3', 'role', '', '', '', 0, 9),
(4, 2, '权限', '', 0, '0,2', '4', 'auth', '', '', '', 0, 9),
(5, 2, '管理员', '', 0, '0,2', '5', 'admin', '', '', '', 0, 9);");
    }
}
