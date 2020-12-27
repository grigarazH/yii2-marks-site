<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $patronymic
 * @property int $work_exp
 *
 * @property MarkHistory[] $markHistories
 * @property TeacherSubject[] $teacherSubjects
 * @property Subject[] $subjects
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'work_exp'], 'required'],
            [['work_exp'], 'integer'],
            [['last_name', 'first_name', 'patronymic'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'patronymic' => 'Отчество',
            'work_exp' => 'Опыт работы',
        ];
    }

    /**
     * Gets query for [[MarkHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkHistories()
    {
        return $this->hasMany(MarkHistory::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[TeacherSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjects()
    {
        return $this->hasMany(TeacherSubject::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[Subjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['id' => 'subject_id'])->viaTable('teacher_subject', ['teacher_id' => 'id']);
    }
}
