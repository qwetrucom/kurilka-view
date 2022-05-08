<?php

use yii\bootstrap5\Nav;

/* @var $parametr core\tools\components\Parametr */
/* @var $book_items core\edit\entities\Library\Book */
/* @var $blog_items core\edit\entities\Blog\Category */
/* @var $community_items core\edit\entities\Community\Page */
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
                'label'   => 'Сообщества',
                'url'     => [
                    '/community/index'
                ],
                'active'  => Yii::$app->controller->id == 'community',
                'items'   => $community_items,
                'options' => [
                    'class' => ''
                ],
            ],
            [
                'label' => 'Блоги',
                'url'     => [
                    '/page/index'
                ],
                'active'  => Yii::$app->controller->id == 'view',
                'items'   => $blog_items,
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
