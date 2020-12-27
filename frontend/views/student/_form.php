<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Group;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
$groups = Group::find()->all();
$groupItems = ArrayHelper::map($groups, 'id','name');
?>
<div class="student-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'groupId')->dropDownList($groupItems,['prompt' => 'Выберите группу'])?>
    <?= $form->field($model, 'imageFile')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
