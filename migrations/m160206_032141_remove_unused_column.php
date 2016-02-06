<?php

use yii\db\Migration;

class m160206_032141_remove_unused_column extends Migration
{

    public function safeUp()
    {
        $this->dropColumn('{{%user}}', 'password');
    }

    public function safeDown()
    {
        $this->addColumn('{{%user}}', 'password', 'VARCHAR(255) DEFAULT "" AFTER `email`');
    }

}
