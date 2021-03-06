<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Paper */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="paper-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'project_id')->textInput() ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'journal_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'publish_time')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'attachment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '插入' : '更改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
