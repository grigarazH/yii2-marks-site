<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оценки';
$this->params['breadcrumbs'][] = $this->title;

$provider = new ActiveDataProvider([
    'query' => $model
]);
?>
<div class="subject-history-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'Студент',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data->student->last_name." ".$data->student->first_name;
                }
            ],
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
        ],
    ]); ?>


</div>