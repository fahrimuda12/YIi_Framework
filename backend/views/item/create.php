<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\ItemCategory;


$this->title = 'Create Item';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$listData = ArrayHelper::map(ItemCategory::find()->all(), 'id', 'name');
?>

<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('Name') ?>
    <?= $form->field($model, 'price')->textInput()->hint('Please enter your price')->label('Price') ?>
    <?= $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt' => 'Select...']
    )->hint('Please select category')->label('Category'); ?>
    <?= $form->field($model, 'gambar')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', [
            'class' => 'btn btn-success'
        ]) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>