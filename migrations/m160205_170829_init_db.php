<?php

use yii\db\Migration;

class m160205_170829_init_db extends Migration
{

    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user}}', [
            'id'               => $this->primaryKey(),
            'username'         => $this->string(255)->notNull(),
            'email'            => $this->string(255)->notNull(),
            'password'         => $this->string(255)->notNull(),
            'password_hash'    => $this->string(255)->notNull(),
            'auth_key'         => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'email' => 'example@example.com',
            'password' => '',
            'password_hash' => '$2y$13$W6edQjkMehxeRujuoOf08Ork7Bepp69cE.R64n7gMe6B0AajeQ4Py',
            'auth_key' => 'g92MSOarBppDwwsw88XYvSn_SapW2FIH',
        ]);

        $this->createTable('{{%authors}}', [
            'id'               => $this->primaryKey(),
            'firstname'             => $this->string(255)->notNull(),
            'lastname'             => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->insert('{{%authors}}', [
            'firstname' => 'Kevin',
            'lastname' => 'Barry',
        ]);
        $this->insert('{{%authors}}', [
            'firstname' => 'Helen',
            'lastname' => 'Phillips',
        ]);

        $this->createTable('{{%books}}', [
            'id'               => $this->primaryKey(),
            'name'             => $this->string(255)->notNull(),
            'date_create'      => $this->dateTime()->notNull(),
            'date_update'      => $this->dateTime()->notNull(),
            'preview'          => $this->string(255)->notNull()->defaultValue('1.jpg'),
            'date'             => $this->string(255)->notNull(),
            'author_id'        => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk_author', '{{%books}}', 'author_id', '{{%authors}}', 'id');

    }

    public function safeDown()
    {
        $this->dropTable('{{%books}}');
        $this->dropTable('{{%authors}}');
        $this->dropTable('{{%user}}');
    }

}
