<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Item;
use yii\web\UploadedFile;
use app\models\UploadForm;
use yii\filters\VerbFilter;
use backend\models\Statistic;
use backend\models\ItemSearch;
use yii\web\NotFoundHttpException;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Item models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Statistic();

        $model->access_time = date("Y-m-d H:i:s");
        $model->user_ip = \Yii::$app->request->userIP;
        $model->user_host = \Yii::$app->request->getHostInfo();
        $model->path_info = \Yii::$app->request->pathInfo;
        $model->query_string = \Yii::$app->request->queryString;

        $model->save();
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Item model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new Statistic();

        $model->access_time = date("Y-m-d H:i:s");
        $model->user_ip = \Yii::$app->request->userIP;
        $model->user_host = \Yii::$app->request->getHostInfo();
        $model->path_info = \Yii::$app->request->pathInfo;
        $model->query_string = \Yii::$app->request->queryString;

        $model->save();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'gambar');
            if ($model->validate()) {
                $model->save();
                if (!empty($gambar)) {
                    $image_new = $model->id . '-' . $gambar->baseName;
                    $gambar->saveAs(Yii::getAlias('@backend/web/img/') . $image_new . '.' . $gambar->extension);
                    $model->gambar = $image_new . '.' . $gambar->extension;
                    $model->save(FALSE);
                }
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }


        // if ($model->load($this->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $iamge_name = $model->gambar;
        if ($model->load(Yii::$app->request->post())) {
            $gambar = UploadedFile::getInstance($model, 'gambar');
            if ($model->validate()) {
                $model->save();
                if (!empty($gambar)) {
                    $image_new = $model->id . '-' . $gambar->baseName;
                    $gambar->saveAs(Yii::getAlias('@backend/web/img/') . $image_new . '.' . $gambar->extension);
                    $model->gambar = $image_new . '.' . $gambar->extension;
                } else {
                    $model->gambar = $iamge_name;
                }
                $model->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionViewGambar($nama)
    {
        $file = Yii::getAlias('@backend/web/img/' . $nama);
        return YIi::$app->response->sendFile($file, NULL, ['inline' => true]);
    }
}
