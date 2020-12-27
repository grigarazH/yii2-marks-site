<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property int $groupId
 *
 * @property MarkHistory[] $markHistories
 * @property Group $group
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_name', 'first_name', 'groupId'], 'required'],
            [['groupId'], 'integer'],
            [['last_name', 'first_name'], 'string', 'max' => 255],
            [['groupId'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['groupId' => 'id']],
            [['imageFile'],'file','skipOnEmpty' => false, 'extensions' => 'png, jpg']
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
            'groupId' => 'Группа',
            'imageFile' => 'Фото',
        ];
    }


    /**
     * Gets query for [[MarkHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkHistories()
    {
        return $this->hasMany(MarkHistory::className(), ['student_id' => 'id']);
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'groupId']);
    }
}
