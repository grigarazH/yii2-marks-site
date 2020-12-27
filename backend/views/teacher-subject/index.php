<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeacherSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teacher Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-subject-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Teacher Subject', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'teacher_id',
            'subject_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
