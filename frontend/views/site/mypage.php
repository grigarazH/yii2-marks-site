<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="site-about-info">
    <?=Html::img('@web/img/home.png') ?>
    <div class="site-about-text">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Cтудент 4 курса в МПТ</p>
    <p>Увлекаюсь разработкой мобильных приложений и веб разработкой</p>
    </div>
    </div>
    <div class="site-about-table">
    <table>
    <tr>
    <th>Навык</th>
    <th>Дата</th>
    <th>Описание</th>
    </tr>
    <tr>
    <td>Swift</td>
    <td>30.08.2020</td>
    <td>Разработка мобильных приложений для iOS на языке Swift</td></tr>
    <td>Kotlin</td>
    <td>08.06.2020</td>
    <td>Разработка мобильных приложений для Android на языке Kotlin</td></tr>
    <td>React Native</td>
    <td>30.06.2020</td>
    <td>Разработка кроссплатформенных мобильных приложений на фреймворке React Native</td></tr>
    </table>
    </div>

</div>
