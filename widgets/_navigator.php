<?php

use yii\bootstrap5\Nav;

/* @var $parametr core\tools\components\Parametr */
/* @var $razdel_items core\edit\entities\Shop\Razdel[] */
/* @var $page_items core\edit\entities\content\Page */
/* @var $menu_items frontend\widgets\NavigatorWidget */

$razdelLabel = $parametr->getRazdel();
$pageLabel   = $parametr->getPage();

?>

<?= Nav::widget(
    [
        'items'        => [
            [
                'label' => 'Главная',
                'url'   => ['/site/index'],
            ],
            [
                'label'   => $razdelLabel,
                'url'     => [
                    '/razdel/index'
                ],
                'active'  => Yii::$app->controller->id == 'razdel',
                'items'   => $razdel_items,
                'options' => [
                    'class' => ''
                ],
            ],
            [
                'label' => $pageLabel,
                'url'     => [
                    '/page/index'
                ],
                'active'  => Yii::$app->controller->id == 'view',
                'items'   => $page_items,
                'options' => [
                    'class' => ''
                ],
            ],
            [
                'label'  => 'Контакты',
                'url'    => [
                    '/contact/index'
                ],
                'active' => Yii::$app->controller->id == 'contact',
            ],
        ],
        'encodeLabels' => false,
        'options'      => [
            'class' => 'nav navbar-nav ms-auto w-100 justify-content-end'
        ],
    ]);
?>
