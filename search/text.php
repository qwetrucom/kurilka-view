<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

/* @var $searchForm common\core\forms\Magazin\Search\TextSearchForm */

use frontend\widgets\Common\AlertWidget;
use frontend\widgets\Magazin\RazdelsWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Поиск';

$this->params['breadcrumbs'][] = $mainTitle;

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

?>
<div class="razdel-screen">
    <div class="container-fluid work-block">
        <div class="container">
            <!-- Headerbar-->
            <?= $this->render(
                '../layouts/_topbar.php'
            ); ?>
            <?= AlertWidget::Widget(); ?>
            <!--End of Headerbar section-->
        </div>
        <div class="container">
            <!--#################################################################-->
            <div class="row">
                <article class="col-md-9">
                    <div class="bgc_black_70">
                        <div class="first-title">
                            <h1><?= Html::encode($this->title); ?></h1>
                        </div>
                        <div class="block-padding">
                            <?php
                            Pjax::begin(
                                [
                                ]
                            );
                            $form = ActiveForm::begin(
                                [
                                    'action'    => [
                                        ''
                                    ], 'method' => 'get'
                                ]
                            ); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <?= $form->field($searchForm, 'text')
                                             ->textInput()
                                             ->label(
                                                 'Ищем')
                                    ; ?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($searchForm, 'razdel')
                                             ->label(
                                                 'в разделе')
                                             ->dropDownList($searchForm->razdelsList(),
                                                            [
                                                                'prompt' => 'выбрать раздел'
                                                            ]
                                             )
                                    ; ?>
                                </div>
                                <div class="col-md-3">
                                    <?= $form->field($searchForm, 'brand')
                                             ->label(
                                                 'марку')
                                             ->dropDownList($searchForm->brandsList(),
                                                            [
                                                                'prompt' => 'выбрать Бренд'
                                                            ]
                                             )
                                    ; ?>
                                </div>
                                <div class="col-md-3">
                                    <?= Html::submitButton('Искать', [
                                                                       'class' => 'btn btn-primary btn-sm btn-block'
                                                                   ]
                                    ); ?>

                                    <?= Html::a(
                                        'Сбросить', [
                                        ''
                                    ],  [
                                            'class' => 'btn btn-danger btn-sm btn-block'
                                        ]
                                    ); ?>
                                </div>
                                <?php
                                ActiveForm::end(); ?>
                            </div>
                        </div>
                        <?= $this->render(
                            '../razdel/_list', [
                                                 'dataProvider' => $dataProvider,
                                             ]
                        ); ?>
                    </div>
                </article>
                <!--#################################################################-->

                <aside id="refer-block" class="col-md-3 hidden-sm">
                    <?= RazdelsWidget::widget(
                        [
                            'active' => $this->params['active_category'] ?? null,
                        ]
                    ); ?>
                </aside>
            </div>
        </div>
    </div>
</div>
