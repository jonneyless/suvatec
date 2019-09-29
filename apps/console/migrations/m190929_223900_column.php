<?php

use yii\db\Migration;

/**
 * Create database
 */
class m190929_223900_column extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $this->addColumn('{{product}}', 'intro', $this->text()->comment('介绍')->after('specification'));
        $this->addColumn('{{page}}', 'summary', $this->text()->comment('简介')->after('description'));
        $this->addPrimaryKey('Gallery Id', '{{product_gallery}}', ['product_id', 'image']);
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropColumn('{{%product}}', 'intro');
        $this->dropColumn('{{%page}}', 'summary');
        $this->dropPrimaryKey('Gallery Id', '{{product_gallery}}');
    }
}
