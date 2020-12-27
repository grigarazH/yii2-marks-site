<?php
    namespace app\models;
    use yii\db\ActiveRecord;
    use app\models\Student;

    class Group extends ActiveRecord {
        public function getStudents(){
            return $this->hasMany(Student::className(),['groupId' => 'id']);
        }
    }