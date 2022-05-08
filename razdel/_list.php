<?php

/* @var $this yii\web\View */

/* @var $dataProvider yii\data\DataProviderInterface */

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="sorting-block">
    <div class="row">
        <div class="col-md-3 col-sm-2 hidden-xs">
            <div class="btn-group btn-group-sm">
                <button onclick="listView()"><i class="fa fa-bars"></i></button>
                <button onclick="gridView()"><i class="fa fa-th-large"></i></button>
            </div>
        </div>
        <div class="col-md-5  col-sm-5 col-xs-6">
            <div class="form-group input-group input-group-sm">
                <label class="input-group-addon" for="input-sort">Сортировать по:</label>
                <select id="input-sort" class="form-control" onchange="location = this.value;">
                    <?php
                    $values = [
                        ''          => 'по умолчанию',
                        'name'      => 'Названию (от А до Я)',
                        '-name'     => 'Названию (от Я до А)',
                        'property'  => 'Цене (сначала дешевые)',
                        '-property' => 'Цене (сначала дорогие)',
                    ];
                    $current = Yii::$app->request->get('sort');
                    ?>
                    <?php foreach ($values as $value => $label) : ?>
                        <option value="<?= Html::encode(Url::current(
                            [
                                'sort' => $value ?: null
                            ]
                        )); ?>"
                                <?php
                                if ($current == $value) : ?>selected="selected"<?php
                        endif; ?>><?= $label ?></option>
                    <?php
                    endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-6">
            <div class="form-group input-group input-group-sm">
                <label class="input-group-addon" for="input-limit">Показывать по:</label>
                <select id="input-limit" class="form-control" onchange="location = this.value;">
                    <?php
                    $values  = [15, 25, 50, 75, 100];
                    $current = $dataProvider->getPagination()
                                            ->getPageSize();
                    ?>
                    <?php
                    foreach ($values as $value) : ?>
                        <option value="<?= Html::encode(Url::current(
                            [
                                'per-page' => $value
                            ]
                        )); ?>"
                                <?php
                                if ($current == $value) : ?>selected="selected"<?php
                        endif; ?>><?= $value ?></option>
                    <?php
                    endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</div>
<hr>
<?php
foreach ($dataProvider->getModels() as $product) : ?>

<?php
endforeach; ?>

<section class="paginator-block row ">
    <div class="col-sm-6 text-left text-silver">
        <?= LinkPager::widget(
            [
                'pagination'     => $dataProvider->getPagination(),
                'maxButtonCount' => 20,
            ]
        ); ?>
    </div>
    <!--        <div class="col-sm-6 text-right text-silver">показаны <?
    /*= $dataProvider->getCount() */ ?>
            из <?
    /*= $dataProvider->getTotalCount() */ ?></div>-->
</section>
