<?php
if ($this->beginCache('cachedview')) {
   foreach ($models as $model) :
      echo $model->id;
      echo $model->username;
      echo $model->email . "<br \>";
?>
<?php
   endforeach;
   $this->endCache();
   echo "Count", \frontend\models\User::find()->count();
}
