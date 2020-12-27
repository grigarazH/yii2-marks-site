<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mark_history}}`.
 */
class m201130_205815_create_mark_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mark_history}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer()->notNull(),
            'student_id' => $this->integer()->notNull(),
            'mark' => $this->integer()->notNull()
        ]);
        $this->createIndex('idx_subject_id', '{{%mark_history}}', ['subject_id']);
        $this->addForeignKey('fk_mark_history_subject', '{{%mark_history}}', ['subject_id'], '{{%subject_history}}', ['id'], 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx_student_id', '{{%mark_history}}', ['student_id']);
        $this->addForeignKey('fk_mark_history_student', '{{%mark_history}}', ['student_id'], '{{%student}}', ['id'], 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx_mark', '{{%mark_history}}', ['mark']);
        $this->addForeignKey('fk_mark_history_mark', '{{%mark_history}}', ['mark'], '{{%mark}}', ['mark'], 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_mark_history_subject', '{{%mark_history}}');
        $this->dropForeignKey('fk_mark_history_student', '{{%mark_history}}');
        $this->dropForeignKey('fk_mark_history_mark', '{{%mark_history}}');
        $this->dropTable('{{%mark_history}}');
    }
}
