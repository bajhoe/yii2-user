# Frequently Asked Questions

## How to change controller's layout?

You can change controller's layout using `controllerMap` module's property:

```php
'modules' => [
    'user' => [
        'class' => 'infinindotech\user\Module',
        'controllerMap' => [
            'admin' => [
                'class'  => 'infinindotech\user\controllers\AdminController',
                'layout' => '//admin-layout',
            ],
        ],
    ],
],
```

## How to get user's avatar url?

```php
\Yii::$app->user->identity->profile->getAvatarUrl();
// or you can specify size of avatar
\Yii::$app->user->identity->profile->getAvatarUrl(150);
```

## How to make one view for registration and login?

You can use Login widget to achieve this:

```php
<?php

use infinindotech\user\widgets\Login;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var infinindotech\user\models\User $user
 * @var infinindotech\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Yii::t('user', 'Sign in') ?></h3>
            </div>
            <div class="panel-body">
                <?= Login::widget() ?>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'layout' => 'floating',
                    'id'                     => 'registration-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'username') ?>

                <?php if ($module->enableGeneratingPassword == false): ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                <?php endif ?>

                <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block mt-3']) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>
```

## How to use flash messages inside login form directly for registration and recovery actions

You can listen controller's events using `controllerMap` module's property:

```php
'modules' => [
    'user' => [
        'class' => 'infinindotech\user\Module',
        'controllerMap' => [
            'recovery' => [
                'class' => \infinindotech\user\controllers\RecoveryController::class,
                'on ' . \infinindotech\user\controllers\RecoveryController::EVENT_AFTER_REQUEST => function (\infinindotech\user\events\FormEvent $event) {
                    \Yii::$app->controller->redirect(['/user/login']);
                    \Yii::$app->end();
                },
                'on ' . \infinindotech\user\controllers\RecoveryController::EVENT_AFTER_RESET => function (\infinindotech\user\events\ResetPasswordEvent $event) {
                    if ($event->token->user ?? false) {
                        \Yii::$app->user->login($event->token->user);
                    }
                    \Yii::$app->controller->redirect(\Yii::$app->getUser()->getReturnUrl());
                    \Yii::$app->end();
                },
            ],
            'registration' => [
                'class' => \infinindotech\user\controllers\RegistrationController::class,
                'on ' . \infinindotech\user\controllers\RegistrationController::EVENT_AFTER_REGISTER => function (\infinindotech\user\events\FormEvent $event) {
                    \Yii::$app->controller->redirect(['/user/login']);
                    \Yii::$app->end();
                },
                'on ' . \infinindotech\user\controllers\RegistrationController::EVENT_AFTER_RESEND => function (\infinindotech\user\events\FormEvent $event) {
                    \Yii::$app->controller->redirect(['/user/login']);
                    \Yii::$app->end();
                },
            ],
        ],
    ],
],
```
 