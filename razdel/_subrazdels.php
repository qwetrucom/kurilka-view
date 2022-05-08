<?php

/* @var $razdel core\edit\entities\Shop\Razdel */

use yii\helpers\Html;
use yii\helpers\Url;

$children = $razdel->children(1)->all()
?>

<?php if ($children) : ?>
    <div class="subrazdel-block">
        <?php foreach ($children as $child) : ?>
            <a href="<?= Html::encode(Url::to(
                [
                    '/razdel/view', 'id' => $child->id
                ]
            )); ?>"><?= Html::encode($child->name); ?></a> &emsp;
        <?php endforeach; ?>
    </div>
<?php endif; ?>

