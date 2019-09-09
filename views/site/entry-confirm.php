<?php

use yii\helpers\Html;

?>

<p>You have entered the following information : </p>

<ul>
    <li>
        <label>Name : </label>
        <p><?= Html::encode($model->name) ?></p>
    </li>
    <li>
        <label>Email : </label>
        <p><?= Html::encode($model->email) ?></p>
    </li>
</ul>