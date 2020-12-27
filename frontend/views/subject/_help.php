<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="subject-view">
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'time',
            'kabinet',
            'pomosh',
            'name'
        ],
    ]) ?>
</div>