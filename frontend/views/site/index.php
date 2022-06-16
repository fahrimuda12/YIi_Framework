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

$this->title = 'Warung Ku';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Warung ku</h1>

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

    <?php foreach ($models as $model) : ?>
        <?= $this->render('_list_item', ['model' => $model]); ?>
        <br />
    <?php endforeach; ?>
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
    // GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'columns' => [
    //         ['class' => 'yii\grid\SerialColumn'],
    //         // Simple columns defined by the data contained in $dataProvider.
    //         // Data from the model's column will be used.

    //         // More complex one.
    //         [
    //             'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
    //             'value' => function ($data) {
    //                 return $data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
    //             },
    //         ],
    //     ],
    // ]);
    // 
    ?> -->

    <!-- <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> -->
</div>