<?php

use yii\db\Migration;

class m190922_150000_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('分类 ID'),
            'parent_id' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('父级分类'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'child' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('是否有子级'),
            'parent_arr' => $this->string()->notNull()->defaultValue(0)->comment('父级链'),
            'child_arr' => $this->text()->comment('子级群'),
            'sort' => $this->bigInteger()->unsigned()->notNull()->defaultValue(0)->comment('排序'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="分类"');
        $this->createIndex('category-parent', '{{%category}}', 'parent_id');

        $this->createTable('{{%product}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('产品 ID'),
            'category_id' => $this->bigInteger()->unsigned()->notNull()->comment('分类 ID'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'preview' => $this->string()->notNull()->defaultValue('')->comment('主图'),
            'keywords' => $this->string()->notNull()->defaultValue('')->comment('SEO 关键字'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('SEO 描述'),
            'specification' => $this->text()->comment('规格'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="产品"');

        $this->createTable('{{%product_overview}}', [
            'product_id' => $this->bigInteger()->unsigned()->notNull()->comment('产品 ID'),
            'type' => $this->string(60)->notNull->comment('区块类型'),
            'image' => $this->string()->notNull()->defaultValue('')->comment('图片'),
            'content' => $this->text()->comment('html'),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('排序'),
        ], $tableOptions . ' COMMENT="产品预览"');

        $this->createTable('{{%page}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('页面 ID'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'keywords' => $this->string()->notNull()->defaultValue('')->comment('SEO 关键字'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('SEO 描述'),
            'content' => $this->text()->comment('内容'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="页面"');

        $this->createTable('{{%user}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('用户 ID'),
            'username' => $this->string(30)->notNull()->unique()->comment('用户名'),
            'auth_key' => $this->string(32)->notNull()->comment('密钥'),
            'password_hash' => $this->string()->notNull()->comment('加密密码'),
            'password_reset_token' => $this->string()->unique()->comment('密码重置 Token'),
            'email' => $this->string(60)->notNull()->unique()->comment('邮箱'),
            'created_at' => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('创建时间'),
            'updated_at' => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('修改时间'),
            'is_admin' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('是否管理员'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="用户"');
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%user}}');
    }
}
