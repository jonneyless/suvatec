<?php

use yii\db\Migration;

/**
 * Create database
 */
class m190928_111900_product_gallery extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_gallery}}', [
            'product_id' => $this->bigInteger()->unsigned()->notNull()->comment('产品 ID'),
            'image' => $this->string()->notNull()->defaultValue('')->comment('图片'),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('排序'),
        ], $tableOptions . ' COMMENT="产品组图"');
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%product_gallery}}');
    }
}
