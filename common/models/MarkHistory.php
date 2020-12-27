<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mark_history".
 *
 * @property int $id
 * @property int $subject_id
 * @property int $student_id
 * @property int $mark
 *
 * @property Mark $mark0
 * @property Student $student
 * @property SubjectHistory $subject
 */
class MarkHistory extends \yii\db\ActiveRecord
{


    private $_markAverage;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mark_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'student_id', 'mark'], 'required'],
            [['subject_id', 'student_id', 'mark'], 'integer'],
            [['mark'], 'exist', 'skipOnError' => true, 'targetClass' => Mark::className(), 'targetAttribute' => ['mark' => 'mark']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectHistory::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Занятие',
            'student_id' => 'Студент',
            'mark' => 'Оценка',
        ];
    }

    /**
     * Gets query for [[Mark0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMark0()
    {
        return $this->hasOne(Mark::className(), ['mark' => 'mark']);
    }

    public function setMarkAverage($average){
        $this->_markAverage = (float) $average;
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(SubjectHistory::className(), ['id' => 'subject_id']);
    }
}
