<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name
 *
 * @property MarkHistory[] $markHistories
 * @property TeacherSubject[] $teacherSubjects
 * @property Teacher[] $teachers
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
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
     * Gets query for [[TeacherSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjects()
    {
        return $this->hasMany(TeacherSubject::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['id' => 'teacher_id'])->viaTable('teacher_subject', ['subject_id' => 'id']);
    }
}
