<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Item;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
use yii\bootstrap4\LinkPager;
use yii\data\ActiveDataProvider;
use frontend\models\ItemCategory;

/** @var yii\web\View $this */

$this->title = 'Segeer';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?= Html::encode($this->title) ?></h1>

        <p class="lead">Selamat datang</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <?php $form = ActiveForm::begin(['action' => ['site/index'], 'options' => ['method' => 'post']]); ?>
    <center>
        <select name="category">
            <option value="0">Select Category</option>
            <?php foreach (ItemCategory::find()->all() as $c) : ?>
                <option value="<?= $c->id; ?>"><?= $c->name; ?></option>
            <?php endforeach; ?>
        </select>

        <?= Html::submitButton('Filter', ['class' => 'btn btn-success']) ?>
    </center>

    <?php ActiveForm::end(); ?>

    <div class="body-content mt-3">
        <div class="row">
            <?php foreach ($models as $item) : ?>
                <div class="col-lg-4">
                    <?= $this->render('_list_item', ['model' => $item]) ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>


    <?=
    LinkPager::widget([
        'pagination' => $pagination
    ])
    ?>
    <!-- <?php
            $dataProvider = new ActiveDataProvider([
                'query' => Item::find(),
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
            ?>
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_list_item', ['model' => $model, 'index' => $index]);
        }
    ]);

    ?> -->

    <!-- <?php foreach ($models as $model) : ?>
        <?= $this->render('_list_item', ['model' => $model]); ?>
        <br />
    <?php endforeach; ?> -->


</div>