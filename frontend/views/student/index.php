<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить студента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'last_name',
            'first_name',
            [
                'attribute' => 'Группа',
                'class' => 'yii\grid\DataColumn',
                'value' => function($data) {
                    return $data->group ->name;
                }
            ],
            [
                'attribute' => 'Фото',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img("@web/uploads/{$data->photo}", ['width' => 145, 'height' => 145]);
                } 
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
