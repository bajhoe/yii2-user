<?php

/*
 * This file is part of the Dektrium project
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/**
 * @var yii\web\View $this
 * @var infinindotech\user\models\User $user
 */
?>

<?php $this->beginContent('@infinindotech/user/views/admin/update.php', ['user' => $user]) ?>

<?php $form = ActiveForm::begin([
    'layout' => 'floating',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-9',
        ],
    ],
]); ?>

<?= $this->render('_user', ['form' => $form, 'user' => $user]) ?>

<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-block btn-success mt-3']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
