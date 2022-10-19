<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap5\Html;
use yii\boostrap5\ActiveForm;
use yii\boostrap5\Button;

/**
 * @var yii\web\View $this
 * @var yii\bootstrap5\ActiveForm $form
 * @var infinindotech\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Reset your password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'layout' => 'floating',
                    'id' => 'password-recovery-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>
                <div class="row">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
                <div class="row">
                    <?= Button::widget(Yii::t('user', 'Finish'), ['class' => 'btn btn-success btn-block','type'=>'submit']) ?><br>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
