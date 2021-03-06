<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="col-lg-4">
   <article class="item" data-key="<?= $model->id ?>">
      <?=
      "<img width='200px' src='" . Url::to(['item/view-gambar', 'nama' => $model->gambar]) . "'>"
      ?>
      <h2 class="title">
         <?= Html::a(
            Html::encode($model->name),
            Url::toRoute(['item/view', 'id' => $model->id]),
            ['title' => $model->name]
         )
         ?>
      </h2>
      <div class="item-detail">
         <b><?= Html::encode('Rp. ' . $model->price); ?></b>
         <?php if (!Yii::$app->user->isGuest) : ?>
            <?= Html::a('Buy', ['item/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
         <?php else : ?>
            <br>
            <small class="text-danger">Please Login to Buy</small>
         <?php endif; ?>
      </div>
      <hr>
   </article>
</div>