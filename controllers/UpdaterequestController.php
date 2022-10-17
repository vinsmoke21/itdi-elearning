<?php

namespace app\controllers;

use Yii;
use app\models\Updatemodel;
use app\models\UpdatemodelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Service;
use app\models\ServiceSearch;
use yii\data\ArrayDataProvider;
use app\models\Rfservices;
use app\models\Rftest;

/**
 * UpdatemodelController implements the CRUD actions for Updatemodel model.
 */
class UpdaterequestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Updatemodel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UpdatemodelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Updatemodel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Updatemodel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new Updatemodel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Updatemodel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->redirect(['details/view', 'id' => $model->id]);    
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Updatemodel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Updatemodel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Updatemodel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Updatemodel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRftest() {

    $out = [];

    if (isset($_POST['depdrop_parents'])) {
        $parents = end($_POST['depdrop_parents']);
        if ($parents != null) {
            $cat_id = $parents[0];
            $list = Rftest::find()->where(['tos_id'=>$parents])->orderBy(['id' => SORT_ASC])->all();

            $selected  = null;
            if ($cat_id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $test) {
                    $out[] = ['id' => $test['sub_service_name'] . ' (Fee: PHP ' . round($test['fee']) . ')', 'name' => [$test['sub_service_name'] . ' (Fee: PHP ' . round($test['fee']) . ')'], 'options' => ['data-division' => $test['division_id']]];
                    if ($i == 0) {
                        $selected = $test['id'];
                    }
                }

                return json_encode(['output' => $out, 'selected'=>$selected]);
            }
        }
    }
        return json_encode(['output'=>'', 'selected'=>'']);
    }

}
