<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject_history}}`.
 */
class m201119_184555_create_subject_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject_history}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'date' => $this->dateTime()->notNull()
        ]);
        $this->createIndex('idx_subject_id', '{{%subject_history}}', ['subject_id']);
        $this->addForeignKey('fk_subject_history_subject', '{{%subject_history}}', ['subject_id'], '{{%subject}}', ['id'], 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx_group_id', '{{%subject_history}}', ['group_id']);
        $this->addForeignKey('fk_subject_history_group', '{{%subject_history}}', ['group_id'], '{{%group}}', ['id'], 'RESTRICT', 'RESTRICT');
        $this->createIndex('idx_teacher_id', '{{%subject_history}}', ['teacher_id']);
        $this->addForeignKey('fk_subject_history_teacher', '{{%subject_history}}', ['teacher_id'], '{{%teacher}}', ['id'], 'RESTRICT', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_subject_history_subject', '{{%subject_history}}');
        $this->dropForeignKey('fk_subject_history_group', '{{%subject_history}}');
        $this->dropForeignKey('fk_subject_history_teacher', '{{%subject_history}}');
        $this->dropTable('{{%subject_history}}');
    }
}
