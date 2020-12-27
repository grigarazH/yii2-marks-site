<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%group}}`
 */
class m200922_073614_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'last_name' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'groupId' => $this->integer()->notNull(),
        ]);

        // creates index for column `groupId`
        $this->createIndex(
            '{{%idx-student-groupId}}',
            '{{%student}}',
            'groupId'
        );

        // add foreign key for table `{{%group}}`
        $this->addForeignKey(
            '{{%fk-student-groupId}}',
            '{{%student}}',
            'groupId',
            '{{%group}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%group}}`
        $this->dropForeignKey(
            '{{%fk-student-groupId}}',
            '{{%student}}'
        );

        // drops index for column `groupId`
        $this->dropIndex(
            '{{%idx-student-groupId}}',
            '{{%student}}'
        );

        $this->dropTable('{{%student}}');
    }
}
