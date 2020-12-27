<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\SubjectHistory;
use common\models\Student;
use common\models\Mark;


$this->title = 'Поставить оценку';
$this->params['breadcrumbs'][] = ['label' => 'Занятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$students = Student::find()->where(['groupId' => $subject->group->id])->all();
$marks = Mark::find()->all();
$time = strtotime($subject->date);
$timeFormatted = date('Y-m-d',$time);
$currentDate = date('Y-m-d',time());
$studentItems = ArrayHelper::map($students, 'id',function($mdl){
        return $mdl->last_name." ".$mdl->first_name;
});
$markItems = ArrayHelper::map($marks,'mark',function($mdl){
    return $mdl->mark." - ".$mdl->description;
});
?>
<?php if($currentDate == $timeFormatted): ?>
<div class="subject-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->dropDownList($studentItems,['prompt' => 'Выберите студента'])?>
    <?= $form->field($model, 'mark')->dropDownList($markItems,['prompt' => 'Выберите оценку'])?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php else: ?>
<p>Добавлять оценку можно только на сегодняшнюю дату</p>
<?php endif;?>
</div>