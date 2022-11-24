<?php

if (Yii::$app->user->getIsGuest()) {
    echo \yii\bootstrap5\Html::a('Login', ['/user/security/login']);
    echo \yii\bootstrap5\Html::a('Registration', ['/user/registration/register']);
} else {
    echo \yii\bootstrap5\Html::a('Logout', ['/user/security/logout']);
}

echo $content;
