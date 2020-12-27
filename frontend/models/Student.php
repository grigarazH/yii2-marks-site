<?php
    namespace app\models;
    use yii\db\ActiveRecord;
    use app\models\Group;

    class Student extends ActiveRecord {
        public function getGroup(){
            return $this->hasOne(Group::className(),['id' => 'groupId']);
        }
    }