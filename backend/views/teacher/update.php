<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Teacher */

$this->title = 'Обновить преподавателя: ' . $model->last_name." ".$model->first_name." ".$model->patronymic;
$this->params['breadcrumbs'][] = ['label' => 'Преподаватели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="teacher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
