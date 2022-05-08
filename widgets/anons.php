<?php

/** @var $anons core\edit\entities\Addon\Anons */

use yii\bootstrap5\Html;

?>

<?php
if ($anons): ?>
    <div class="card anons">
        <div class="card-header">
            <?= Yii::$app->formatter->asHtml($anons->name) ?>
        </div>
        <div class="card-body p-3">
            <?= Yii::$app->formatter->asHtml($anons->description); ?>
        </div>
        <div class="card-footer text-right">
            <?= Html::tag(
                'strong',
                Html::a(
                    'подробнее...',
                    $anons->reference
                )
            ); ?>

        </div>
    </div>
<?php
endif; ?>
