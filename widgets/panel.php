<?php

use frontend\widgets\Addon\BannerWidget;

?>

<?php foreach ($panels as $panel): ?>

    <?= ($panel->block1) ?
        BannerWidget::widget(
[
            'blockID' => $panel->block1,
        ])
        :
        Null;
    ?>

    <?= ($panel->block2) ?
        BannerWidget::widget(
[
            'blockID' => $panel->block2,
        ])
        :
        Null;
    ?>

    <?= ($panel->block3) ?
        BannerWidget::widget(
[
            'blockID' => $panel->block3,
        ])
        :
        Null;
    ?>
    <?= ($panel->block4) ?
        BannerWidget::widget(
[
            'blockID' => $panel->block4,
        ])
        :
        Null;
    ?>

<?php endforeach; ?>