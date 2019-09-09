<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

?>

<h1>Countries</h1>

<a href="<?= Url::to('/') ?>">Back</a>

<ul>
    <?php foreach ($countries as $country) : ?>
        <li>
            <?= Html::encode("{$country->code} ({$country->name})") ?>
            <?= $country->population ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>