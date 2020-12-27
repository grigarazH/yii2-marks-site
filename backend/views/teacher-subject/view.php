<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubject */

$this->title = $model->teacher_id;
$this->params['breadcrumbs'][] = ['label' => 'Teacher Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="teacher-subject-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'teacher_id' => $model->teacher_id, 'subject_id' => $model->subject_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'teacher_id' => $model->teacher_id, 'subject_id' => $model->subject_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teacher_id',
            'subject_id',
        ],
    ]) ?>

</div>
