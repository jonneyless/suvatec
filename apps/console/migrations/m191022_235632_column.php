<?php

use yii\db\Migration;

/**
 * Create database
 */
class m191022_235632_column extends Migration
{
    /**
     * @return bool|void
     */
    public function up()
    {
        $this->addColumn('{{product}}', 'is_star', $this->tinyInteger(1)->unsigned()->notNull()->comment('推荐')->after('intro'));
    }

    /**
     * @return bool|void
     */
    public function down()
    {
        $this->dropColumn('{{%product}}', 'is_star');
    }
}
