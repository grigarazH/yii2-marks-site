<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use common\models\MarkHistory;
use common\models\SubjectHistory;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = $model->last_name." ".$model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Студенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$marksQuery = MarkHistory::find()->where(['student_id' => $model->id]);
$marksProvider = new ActiveDataProvider([
    'query' => $marksQuery
]);
$average = $marksQuery->average('mark');
$marksArray= MarkHistory::findBySql("select min(mark_history.id) as id, subject.name as subject, avg(mark_history.mark) as mark
from mark_history 
inner join subject_history on mark_history.subject_id = subject_history.id
inner join subject on subject_history.subject_id = subject.id
where mark_history.student_id = $model->id
group by subject.id")->asArray()->all();
$avgMarkProvider = new ArrayDataProvider([
    'allModels' => $marksArray,
]);
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить студента?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'last_name',
            'first_name',
            [
                'attribute' => 'Группа',
                'class' => 'yii\grid\DataColumn',
                'value' => function($model) {
                    return $model->group->name;
                }
            ],
            [
                'attribute' => 'Фото',
                'class' => 'yii\grid\DataColumn',
                'value' => "@web/uploads/$model->photo",
                'format' => ['image', ['width' => 400, 'height' => 400]],
            ]
        ],
    ]) ?>
    Оценки студента
    <?= GridView::widget([
        'dataProvider' => $marksProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'Занятие',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data->subject->subject->name;
                }
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'Оценка',
                'value' => function($data) {
                    return $data->mark0->description;
                }
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'Дата',
                'value' => function($data) {
                    return $data->subject->date;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    Средний балл по каждому предмету: 
    <?= GridView::widget([
        'dataProvider' => $avgMarkProvider,
        'columns' => [
            [
                'attribute' => 'ID',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data['id'];
                }
            ],
            [
                'attribute' => 'Предмет',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data['subject'];
                }
            ],
            [
                'attribute' => 'Оценка',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data['mark'];
                }
            ]
        ],
    ]);?>
    Средний балл по предметам: <?= $average ?>

</div>
