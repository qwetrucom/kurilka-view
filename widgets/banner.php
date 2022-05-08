<?php


use yii\bootstrap5\Html;

$url = $banner->reference;
?>

<div class="card">
    <div class="card-header text-white bg-secondary">
        <?= Html::tag('h5', Html::a(Html::encode($banner->name), $url), ['class' => 'title text-white']); ?>
    </div>
    <?= ($banner->picture) ?
        Html::a(Html::img($banner->picture, ['class' => 'card-img-top']), $url)
        :
        null; ?>

    <div class="card-body">
        <?= ($banner->description) ?
            Yii::$app->formatter->asHtml($banner->description)
            :
            null; ?>
    </div>

    <div class="card-footer bg-black text-right">
        <?= ($banner->reference) ?
            Html::a('подробнее', $url, ['class' => '', 'target' => '_blank'])
            :
            null; ?>
    </div>

</div>
