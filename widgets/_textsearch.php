<?php

use yii\helpers\Html;

?>

<!--ArticulSearch section-->
<?= Html::beginForm(
    [
        '/search/name'
    ], 'get'); ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" name="text" placeholder="поиск по сайту"
           aria-label="поиск по сайту" aria-describedby="search">
</div>
<?= Html::endForm(); ?>

<!--end of ArticulSearch section-->