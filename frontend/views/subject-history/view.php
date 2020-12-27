<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Subject */

$this->title = $model->subject->name." ".$model->group->name." ".$model->date;
$this->params['breadcrumbs'][] = ['label' => 'Занятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subject-history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Поставить оценку', ['add-mark', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Просмотреть оценки', ['view-mark', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Группа',
                'value' => $model->group->name,
            ],
            [
                'label' => 'Занятие',
                'value' => $model->subject->name,
            ],
            [
                'label' => 'Преподаватель',
                'value' => $model->teacher->last_name." ".$model->teacher->first_name." ".$model->teacher->patronymic,
            ],
            'date'
        ],
    ]) ?>

</div>