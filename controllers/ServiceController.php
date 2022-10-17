<?php

namespace app\controllers;

use Yii;
use app\models\RfMainService;
use app\models\RfMainServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\lab\Section;
use app\models\SampleType;
use app\models\Calibration;
use app\models\Particulars;

/**
 * RfMainServiceController implements the CRUD actions for RfMainService model.
 */
class ServiceController extends Controller
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
     * Lists all RfMainService models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RfMainServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RfMainService model.
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
     * Creates a new RfMainService model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RfMainService();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['createrequest', 'id' => $model->id]);
            return $this->redirect(['/details/create', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RfMainService model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RfMainService model.
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

          public function actionCreaterequest($id)
    {
        
            return $this->render('createrequest', [
            'model' => $this->findModel($id),
        ]);
    }
    

    /**
     * Finds the RfMainService model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RfMainService the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RfMainService::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSubcat() {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = ArrayHelper::getColumn(SampleType::getSampleType($cat_id), function ($element) {
                return [
                    'id' => $element['id'],
                    'name' => $element['stype_name'],
                ];
            }); 

            return ['output'=>$out, 'selected'=>''];
        }
    }
    return ['output'=>'', 'selected'=>''];
}

    public function actionSnsubcat() {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        $params = $_POST['depdrop_params'];
        $cat_id = empty($params[0]) ? null : $params[0];
        $subcat_id = empty($parents[0]) ? null : $parents[0];
        if ($cat_id != null && $subcat_id != null) {
            $out = ArrayHelper::getColumn(Calibration::getCalibration($cat_id, $subcat_id), function ($element) {
                return [
                    'id' => $element['id'],
                    'name' => $element['sample_name'],
                ];
            }); 
           
            return ['output'=>$out, 'selected'=>''];
        }
    }
    return ['output'=>'', 'selected'=>''];
}

    public function actionPsubcat() {
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $out = [];
    // var_dump($_POST); die;
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        $snsubcat_id = empty($parents[0]) ? null : $parents[0];
        if ($snsubcat_id != null) {
            $out = ArrayHelper::getColumn(Particulars::getParticulars($snsubcat_id), function ($element) {
                return [
                    'id' => $element['id'],
                    'name' => $element['range_capacity'],
                ];
            }); 
           
            return ['output'=>$out, 'selected'=>''];
        }
    }
    return ['output'=>'', 'selected'=>''];
}


}