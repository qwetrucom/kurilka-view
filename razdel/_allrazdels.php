<?php

/* @var $this yii\web\View */

/* @var $dataProvider yii\data\DataProviderInterface */

use yii\helpers\Html;

?>

<?php foreach ($razdel->children as $child) : ?>
    <div class=" col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
            <?= Html::img($child->getThumbFileUrl('photo', 'col-3'),
                          [
                              'class' => 'card-img-top'
                          ]
            ); ?>
            <div class="card-header">
                <?= Html::a($child->name, [
                                            '/razdel/view', 'id' => $child->id
                                        ]
                ); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    <?= Html::a($child->title, [
                                                 '/razdel/view', 'id' => $child->id
                                             ]
                    ); ?>
                </h5>
                <p class="card-text"><?= Html::encode($child->description); ?></p>
            </div>
            <div class="card-footer">
                <?= Html::a(
                    'подробнее...', [
                                      '/razdel/view', 'id' => $child->id
                                  ]
                ); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

