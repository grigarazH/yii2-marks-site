<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mark".
 *
 * @property int $mark
 * @property string $description
 *
 * @property MarkHistory[] $markHistories
 */
class Mark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark', 'description'], 'required'],
            [['mark'], 'integer'],
            [['description'], 'string', 'max' => 30],
            [['mark'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mark' => 'Оценка',
            'description' => 'Описание',
        ];
    }

    /**
     * Gets query for [[MarkHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkHistories()
    {
        return $this->hasMany(MarkHistory::className(), ['mark' => 'mark']);
    }
}
