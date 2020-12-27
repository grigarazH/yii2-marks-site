<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Group;
use common\models\Subject;
use common\models\Teacher;


$this->title = 'Добавить занятие';
$this->params['breadcrumbs'][] = ['label' => 'Занятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$groups = Group::find()->all();
$groupItems = ArrayHelper::map($groups, 'id','name');
$subjects = Subject::find()->all();
$subjectItems = ArrayHelper::map($subjects,'id','name');
$teachers = Teacher::find()->all();
$teacherItems = ArrayHelper::map($teachers, 'id',function($mdl){
    if($mdl->patronymic != null){
    return $mdl->last_name." ".$mdl->first_name." ".$mdl->patronymic;
    }else{
        return $mdl->last_name." ".$mdl->first_name;
    }
})
?>
<div class="subject-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->dropDownList($subjectItems,['prompt' => 'Выберите занятие'])?>
    <?= $form->field($model, 'group_id')->dropDownList($groupItems,['prompt' => 'Выберите группу'])?>
    <?= $form->field($model, 'teacher_id')->dropDownList($teacherItems,['prompt' => 'Выберите преподавателя'])?>
    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd'
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
