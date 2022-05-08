<?php

/* @var $this yii\web\View */
/* @var $razdel array */
/* @var $parametr array */
/* @var $dataProvider yii\data\DataProviderInterface */

/* @var $tag core\edit\entities\Shop\Tag */

use frontend\widgets\Shop\RazdelsWidget;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title                   = 'Услуги с меткой ' . $tag->name;
$this->params['breadcrumbs'][] = [
    'label' => $parametr->config->mainLabel, 'url' => [
        'index'
    ]
];
$this->params['breadcrumbs'][] = $tag->name;

$this->registerMetaTag(
    [
        'name' => 'description', 'content' => $this->title
    ]
);
$this->registerMetaTag(
    [
        'name' => 'keywords', 'content' => $this->title
    ]
);
$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);

$this->params['razdel']   = $razdel;
$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;
?>

<h3>Услуги с меткой</h3>
<h1>&laquo;<?= Html::encode($tag->name); ?>&raquo;</h1>

<?= $this->render(
    '_list', [
               'dataProvider' => $dataProvider,
           ]
); ?>

