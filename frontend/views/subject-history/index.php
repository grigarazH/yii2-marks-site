<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История занятий';
$this->params['breadcrumbs'][] = $this->title;

$provider = new ActiveDataProvider([
    'query' => $model
]);
?>
<div class="subject-history-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить занятие', ['add'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'Группа',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data->group->name;
                }
            ],
            [
                'attribute' => 'Занятие',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data->subject->name;
                }
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'Преподаватель',
                'value' => function($data) {
                    return $data->teacher->last_name." ".$data->teacher->first_name." ".$data->teacher->patronymic;
                }
            ],
            'date',
            ['class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => true,
                'update' => false,
                'delete' => false,
            ]
        ],
        ],
    ]); ?>


</div>