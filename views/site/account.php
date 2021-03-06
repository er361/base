<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $resetPasswordForm \app\models\forms\ResetPasswordForm */

$this->title = Yii::t('user', 'My Account');
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo Yii::t('user', 'Change Password'); ?>
                </div>

                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?php echo $form->field($resetPasswordForm, 'password')->passwordInput(); ?>
                    <?php echo $form->field($resetPasswordForm, 'confirmPassword')->passwordInput(); ?>
                    <div class="form-group">
                        <?php echo Html::resetButton(Yii::t('user', 'Cancel'), ['class' => 'btn btn-default']) ?>
                        <?php echo Html::submitButton(Yii::t('user', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading no-bottom-border">
                    <?php echo Yii::t('user', 'Personal Information'); ?>
                </div>
                <div class="table-responsive">
                    <?php echo DetailView::widget([
                        'model' => Yii::$app->user->identity,
                        'attributes' => [
                            'username',
                            'email',
                            'lastLogin:date'
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>