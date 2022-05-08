<?php


use frontend\widgets\Common\CardWidget;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $parametr core\tools\components\Parametr */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $category core\edit\entities\Blog\Post */

$this->params['parametr'] = $parametr;
$this->params['title']    = $this->title;

$this->title = 'о SEO-продвижении и разном прочем';

$this->params['breadcrumbs'][] = $this->title;

?>

<!--#############################################################################################-->
<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
    <div class="about-desc">
        <span class="heading-meta">Блог</span>
        <?= Html::tag('h1', Html::encode($this->title)); ?>
    </div>
</div>

<div class="second-razdel">
    <div class="row row-cols-2  row-cols-xs-2  row-cols-sm-3 row-cols-md-4">
        <?php foreach ($dataProvider->getModels() as $model): ?>

            <?php $cardUrl = Url::to(
                    [
                            'view', 
                            'slug' => $model->slug
                    ]
            ); ?>
            <?php $cardImg = Html::img(
                    $model->mainPhoto->getThumbFileUrl(
                            'file',
                            'col-3'
                    ), 
                    [
                            'class' => 'card-img-top', 
                            'alt' => Html::encode($model->name)
                    ]); ?>
        
            <?php $cardTitle = Html::encode($model->name); ?>

            <div class='col mb-4 sm-6 animate-box' data-animate-effect='fadeInLeft'>
                <div class="card h-100 ">

                    <?= Html::a($cardImg, $cardUrl) ?>

                    <div class="card-body">

                        <?= Html::tag(
                                'h5', 
                                Html::a($cardTitle, $cardUrl), 
                                [
                                        'class' => 'card-title text-center'
                                ]); ?>

                        <?= ($model->content) 
                            ? 
                            Yii::$app->formatter->asHtml($model->description)
                            : null; ?>

                    </div>

                    <div class="card-footer bg-light-grey text-right">
                        <?= Html::a('подробнее', $cardUrl) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<section class="paginator-block row ">
    <div class="col-sm-6 text-left text-silver">
        <?= LinkPager::widget(
[
            'pagination' => $dataProvider->getPagination(),
        ]
); ?>
    </div>
    <div class="col-sm-6 text-right text-silver">показаны <?= $dataProvider->getCount() ?>
        из <?= $dataProvider->getTotalCount() ?>
    </div>
</section>
