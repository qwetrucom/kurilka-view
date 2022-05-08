<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $parametr core\tools\components\Parametr */
/* @var $model frontend\forms\OrderForm; */
/* @var $product core\edit\entities\Shop\Product\Product */

use core\edit\entities\Shop\Product\Value;
use core\edit\helpers\Shop\PriceHelper;
use frontend\widgets\Shop\TableWidget;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<?php
$i = 1; ?>
<?php
foreach ($dataProvider->getModels() as $product):
    if ($product) : ?>
        <div class="accordion" id="product<?= $i; ?>">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $i; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse<?= $i; ?>" aria-expanded="false"
                            aria-controls="collapse<?= $i; ?>">
                        <?= $i; ?>.
                        <?= Html::encode($product->title); ?>
                    </button>
                </h2>
                <div id="collapse<?= $i; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $i; ?>"
                     data-bs-parent="#product<?= $i; ?>">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-4 details">

                                <?= Html::img(
                                    $product->mainPhoto?->getThumbFileUrl(
                                        'file',
                                        'col-6'
                                    ),
                                    [
                                        'class' => 'img-fluid'
                                    ]
                                ); ?>

                                <?= Html::tag(
                                    'h5', Html::encode($product->title)); ?>

                                <ul class="">
                                    <li class="small">
                                        Метки:
                                        <?php
                                        foreach ($product->tags as $tag) : ?>
                                            <?= Html::a($tag->name,
                                                        [
                                                            'tag',
                                                            'slug' => $tag->slug
                                                        ]
                                            ); ?>,
                                        <?php
                                        endforeach; ?>
                                    </li>
                                    <?php
                                    if ($product->brand) : ?>
                                        <li class="small">Бренд - <?= Html::a(
                                                Html::encode($product->brand->name),
                                                [
                                                    '/razdel/brand/', 
                                                    'slug' => $product->brand->slug
                                                ]
                                            ); ?></li>
                                    <?php
                                    endif; ?>
                                </ul>

                                <div class="small">
                                    <?= DetailView::widget(
                                        [
                                            'model'      => $product,
                                            'id'         => $i,
                                            'attributes' => array_map(
                                                function (Value $value) {
                                                    return [
                                                        'label' => $value->characteristic->name,
                                                        'value' => $value->value,
                                                    ];
                                                }, $product->values),
                                        ]
                                    ); ?>
                                </div>
                                <div class="price-body">
                                    <span class="price">
                                        <?= PriceHelper::format($product->property?->price1); ?>
                                    </span>
                                    <small>руб.</small>
                                </div>
                                <div class="btn-body">
                                    <button type="button"
                                            class="btn btn-outline-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#orderModal-<?= $i; ?>">
                                        Заказать
                                    </button>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <?= Yii::$app->formatter
                                    ->asHtml(
                                        $product->text,
                                        [
                                            'Attr.AllowedRel'      => ['nofollow'],
                                            'HTML.SafeObject'      => true,
                                            'Output.FlashCompat'   => true,
                                            'HTML.SafeIframe'      => true,
                                            'URI.SafeIframeRegexp' => '%^(https?:)?//(www\.youtube(?:-nocookie)?\.com/embed/|player\.vimeo\.com/video/)%',
                                        ]
                                    )
                                ; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade"
             id="orderModal-<?= $i; ?>"
             tabindex="-1"
             aria-labelledby="orderModal-<?= $i; ?>"
             aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content border-white">
                    <div class="modal-header bg-black text-white">
                        <h5 class="modal-title" id="modalLabel-<?= $i; ?>">
                            Заказать "<?= $product->name; ?>"
                        </h5>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Закрыть">

                        </button>
                    </div>
                    <div class="modal-body bg-dark text-white">
                        <?php
                        $form = ActiveForm::begin(
                            [
                                'id' => 'order-form-' . $i
                            ]
                        ); ?>

                        <?= $form->field($model, 'name')
                                 ->label(
                                     'Имя')
                                 ->textInput(
                                     [
                                         'autofocus' => true
                                     ]
                                 )
                        ; ?>

                        <?= $form->field($model, 'email')
                                 ->label(
                                     'E-mail')
                        ; ?>

                        <?= $form->field($model, 'product')
                                 ->label(
                                     false)
                                 ->hiddenInput(
                                     [
                                         'value' => $product->name
                                     ]
                                 )
                        ; ?>

                        <?= $form->field($model, 'notes')
                                 ->label(
                                     'Замечания, номер контактного телефона для быстрой связи')
                                 ->textarea(
                                     [
                                         'rows' => 6
                                     ]
                                 )
                        ; ?>

                        <div class="form-group">
                            <?= Html::submitButton(
                                'Отправить',
                                [
                                    'class' => 'btn btn-primary',
                                    'name'  => 'contact-button'
                                ]
                            ); ?>
                        </div>

                        <?php
                        ActiveForm::end(); ?>
                    </div>
                    <div class="bg-black text-white text-center">
                        <h5 class="p-2">Контактный телефон: <?= $parametr->phone; ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $i++;
    endif;
endforeach; ?>
