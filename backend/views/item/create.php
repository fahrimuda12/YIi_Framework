<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Item';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('Name') ?>
    <?= $form->field($model, 'price')->textInput()->hint('Please enter your price')->label('Price') ?>
    <?= $form->field($model, 'category_id')->input('number')->label('Category ID') ?>
    <?= $form->field($model, 'gambar')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-success'
        ]) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>