<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

/* @var $searchForm common\core\forms\Magazin\Search\ArticulForm */

use core\edit\entities\Magazin\Product\Product;
use core\edit\entities\Magazin\Product\Stock;
use common\core\forms\Magazin\Search\ArticulForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Поиск по артикулу';

$this->params['breadcrumbs'][] = $mainTitle;

$model = new ArticulForm();

$this->registerLinkTag(
    [
        'rel' => 'canonical', 'href' => Url::canonical()
    ]
);

?>
<div class="search-screen">

    <div class="container work-block">

        <article class="content-view">

            <div class="first-title">
                <div class="row">
                    <div class="col-md-9">
                        <h1><?= Html::encode($this->title); ?></h1>
                    </div>

                    <div class="col-md-3">
                        <?= Html::beginForm(
                            [
                                '/shop/search'
                            ], 'get'); ?>
                        <div id="search-name" class="input-group">
                            <input type="text" name="text" value="" placeholder="поиск по названию"
                                   class="form-control input-md"/>
                            <span class="input-group-btn">
                        <button type="submit" class="btn btn-default btn-md"><i class="fa fa-search"></i></button>
                    </span>
                        </div>
                    </div>
                    <?= Html::endForm(); ?>
                </div>
            </div>


            <div class="block-padding">
                <?= Html::beginForm(
                    [
                        '/shop/articul'
                    ], 'get'); ?>
                <div id="search-articul" class="input-group">
                    <input type="text" name="nomer" value="" placeholder="артикул " class="form-control input-md"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default btn-md"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                <?= Html::endForm(); ?>
            </div>

            <div class="block-padding">
                <?= GridView::widget(
                    [
                        'dataProvider' => $dataProvider,
                        'columns'      => [
                            [
                                'attribute' => 'name',
                                'label'     => 'Название',
                                'value'     => function (Product $model) {
                                    return Html::a(
                                        Html::encode($model->name),
                                        [
                                            '/razdel/product', 'id' => $model->id
                                        ]
                                    );
                                },
                                'format'    => 'raw',
                        ],
                            /*                        [
                                                        'attribute' => 'category_id',
                                                        'label' => 'Категория',
                                                        'value' => 'category.name',
                                                    ],*/
                            [
                                'attribute' => 'articul',
                                'label'     => 'Артикул',
                            ],
                            [
                                'attribute' => 'property',
                                'label'     => 'Цена',
                            ],
                        ],
                    ]
                ); ?>
            </div>
        </article>
    </div>
</div>


