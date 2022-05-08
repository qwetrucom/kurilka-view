<?php

/* @var $parametr array */
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $brand core\edit\entities\Shop\Brand */

/* @var $razdel core\edit\entities\Shop\Razdel */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $brand->name;
$this->registerMetaTag(
    [
        'name' => 'description', 'content' => $brand->seoDescription
    ]
);
$this->registerMetaTag(
    [
        'name' => 'keywords', 'content' => $brand->seoKeys
    ]
);
$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);

$this->params['breadcrumbs'][] = [
    'label' => 'Партнеры', 'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $brand->name;
$this->params['razdel']        = $razdel;
$this->params['parametr']      = $parametr;

?>


<div class="first-title">
    <h3>бренд</h3>
    <h1>&laquo;<?= Html::encode($brand->name); ?>&raquo;</h1>
</div>

<div class="block-padding">
    <?= Yii::$app->formatter
        ->asHtml($brand->text, [
                                 'Attr.AllowedRel'      => [
                                     'nofollow'
                                 ],
                                 'HTML.SafeObject'      => true,
                                 'Output.FlashCompat'   => true,
                                 'HTML.SafeIframe'      => true,
                                 'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                             ]
        )
    ; ?>
</div>