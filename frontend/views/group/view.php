<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use common\models\Student;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Group */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Группы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$studentQuery = Student::find()->where(['student_id' => $model->id]);
$studentActiveProvider = new ActiveDataProvider([
    'query' => $studentQuery
]);
\yii\web\YiiAsset::register($this);
?>
<div class="group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить группу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

Студенты
    <?= GridView::widget([
        'dataProvider' => $studentActiveProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'last_name',
            'first_name',
        ],
    ]); ?>

</div>
