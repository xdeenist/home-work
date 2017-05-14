<?php

use yii\db\Migration;

class m170423_153038_fix_tags extends Migration
{
    public function safeUp()
    {

        $sql = <<<SQL
ALTER TABLE `tag` CHANGE `tag_id` `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT;
SQL;

        $this->execute($sql);
    }

    public function safeDown()
    {
        echo "m170423_153038_fix_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170423_153038_fix_tags cannot be reverted.\n";

        return false;
    }
    */
}
