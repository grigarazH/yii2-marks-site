<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject_history".
 *
 * @property int $id
 * @property int $subject_id
 * @property int $teacher_id
 * @property int $group_id
 * @property string $date
 *
 * @property MarkHistory[] $markHistories
 * @property Group $group
 * @property Subject $subject
 * @property Teacher $teacher
 */
class SubjectHistory extends \yii\db\ActiveRecord
{
    public $average;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'teacher_id', 'group_id', 'date'], 'required'],
            [['subject_id', 'teacher_id', 'group_id'], 'integer'],
            [['date'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'subject_id' => 'Занятие',
            'teacher_id' => 'Преподаватель',
            'group_id' => 'Группа',
            'date' => 'Дата',
        ];
    }

    /**
     * Gets query for [[MarkHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkHistories()
    {
        return $this->hasMany(MarkHistory::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }
}
