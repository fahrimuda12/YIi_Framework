<?php

use yii\grid\GridView;
use frontend\models\Item;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

/** @var yii\web\View $this */

$this->title = 'Warung Ku';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Warung ku</h1>

        <p class="lead">Selamat datang</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <?php
    $dataProvider = new ActiveDataProvider([
        'query' => Item::find(),
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);
    ?>
    <div class="body-content">
        <div class="row">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => function ($model) {
                    return $this->render('_list_item', ['model' => $model]);
                }
            ]);
            ?>
        </div>
    </div>
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
        </div>

    </div> -->
</div>