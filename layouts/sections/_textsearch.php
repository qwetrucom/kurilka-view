<?php

use yii\bootstrap5\Html;

?>

<?= Html::beginForm(
    [
        '/search/text'
    ], 'get'); ?>
<div class="input-group mb-1">
    <input type="text" class="form-control" name="text" placeholder="поиск по сайту" aria-label="поиск по сайту"
           aria-describedby="search">
    <div class="input-group-append">
        <?= Html::submitButton('<i class="fas fa-search"></i>', [
                                                                  'class' => 'btn btn-secondary', 'type' => 'button'
                                                              ]
        ); ?>
    </div>
</div>

<?= Html::endForm(); ?>
