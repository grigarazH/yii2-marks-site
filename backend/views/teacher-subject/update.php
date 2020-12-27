<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubject */

$this->title = 'Update Teacher Subject: ' . $model->teacher_id;
$this->params['breadcrumbs'][] = ['label' => 'Teacher Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teacher_id, 'url' => ['view', 'teacher_id' => $model->teacher_id, 'subject_id' => $model->subject_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teacher-subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
