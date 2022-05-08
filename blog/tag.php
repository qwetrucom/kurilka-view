<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProviderInterface */

/* @var $tag core\edit\entities\Blog\Tag */

use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Посты с меткой ' . Html::encode($tag->name);


$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $tag->name;


?>
<div class="blog-screen">
    <!-- Headerbar-->
    <?= $this->render(
        '../layouts/sections/_topbar.php'
    ) ?>
    <!--End of Headerbar section-->

    <section class="container">
        <div class="black-trans">


            <div class="first-title">
                <h1>Посты с меткой &laquo;<?= Html::encode($tag->name) ?>&raquo;</h1>
            </div>
            <?= $this->render('_list', [
                'dataProvider' => $dataProvider,
            ]
); ?>
        </div>
    </section>
</div>