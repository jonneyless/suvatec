<?php

use yii\db\Migration;

/**
 * import init data
 */
class m190922_173000_datas extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $model = new \admin\models\Admin;
        $model->username = 'admin';
        $model->password = '123456';
        $model->setPassword();
        $model->generateAuthKey();

        $this->execute("INSERT INTO `admin` (`id`, `role_id`, `username`, `password_hash`, `auth_key`, `created_at`, `updated_at`, `status`) VALUES
(1, 0, 'admin', '" . $model->password_hash . "', '" . $model->auth_key . "', '".time()."', '".time()."', 9);");

        $this->execute("INSERT INTO `menu` (`id`, `parent_id`, `name`, `icon`, `child`, `parent_arr`, `child_arr`, `controller`, `action`, `params`, `auth_item`, `sort`, `status`) VALUES
(1, 0, '仪表盘', 'dashboard', 0, '0', '1', 'site', 'index', '', '', 0, 9),
(2, 0, '系统', 'cog', 1, '0', '2,3,4,5', '', '', '', '', 0, 9),
(3, 2, '角色', '', 0, '0,2', '3', 'role', '', '', '', 0, 9),
(4, 2, '权限', '', 0, '0,2', '4', 'auth', '', '', '', 0, 9),
(5, 2, '管理员', '', 0, '0,2', '5', 'admin', '', '', '', 0, 9);");
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->truncateTable('{{%admin}}');
        $this->truncateTable('{{%menu}}');
    }
}
