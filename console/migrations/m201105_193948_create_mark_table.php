<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mark}}`.
 */
class m201105_193948_create_mark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mark}}', [
            'mark' => $this->integer()->notNull(),
            'description' => $this->string(30)->notNull(),
            
        ]);
        $this->addPrimaryKey("mark_pk", "mark", ["mark"]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mark}}');
    }
}
