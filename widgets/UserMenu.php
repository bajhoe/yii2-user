<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace infinindotech\user\widgets;

// use yii\widgets\Menu;
// use yii\bootstrap5\Menu;
use yii\bootstrap5\Nav;
use Yii;
use yii\base\Widget;

/**
 * User menu widget.
 */
class UserMenu extends Widget
{
    
    /** @array \infinindotech\user\models\RegistrationForm */
    public $items;
    
    public function init()
    {
        parent::init();
        
        $networksVisible = count(Yii::$app->authClientCollection->clients) > 0;
        
        $this->items = [
                ['label' => Yii::t('user', 'Profile'), 'url' => ['/user/settings/profile']],
                ['label' => Yii::t('user', 'Account'), 'url' => ['/user/settings/account']],
                [
                    'label' => Yii::t('user', 'Networks'),
                    'url' => ['/user/settings/networks'],
                    'visible' => $networksVisible
                ],
            ];
    }
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        return Nav::widget([
            'options' => [
                'class' => 'nav-pills nav-stacked',
            ],
            'items' => $this->items,
        ]);
    }
}
