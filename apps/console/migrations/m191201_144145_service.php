<?php

use admin\models\Service;
use yii\db\Migration;

/**
 * Create database
 */
class m191201_144145_service extends Migration
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

        $this->createTable('{{%service}}', [
            'id' => $this->bigPrimaryKey()->unsigned()->comment('服务 ID'),
            'name' => $this->string(60)->notNull()->comment('名称'),
            'slug' => $this->string()->unique()->comment('识别字串'),
            'keywords' => $this->string()->notNull()->defaultValue('')->comment('SEO 关键字'),
            'description' => $this->string()->notNull()->defaultValue('')->comment('SEO 描述'),
            'content' => $this->text()->comment('内容'),
            'status' => $this->smallInteger(1)->unsigned()->notNull()->defaultValue(0)->comment('状态'),
        ], $tableOptions . ' COMMENT="服务"');

        $servics = ['Manufacture', 'Assembly', 'Packing', 'Transport', 'Location', 'Customer'];

        foreach ($servics as $servic) {
            $model = new Service();
            $model->name = $servic;
            $model->slug = strtolower($servic);
            $model->save();
        }
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropTable('{{%service}}');
    }
}
