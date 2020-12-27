<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher}}`.
 */
class m201105_193118_create_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'last_name' => $this->string(30)->notNull(),
            'first_name' => $this->string(30)->notNull(),
            'patronymic' => $this->string(30),
            'work_exp' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%teacher}}');
    }
}
