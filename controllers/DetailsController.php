<?php

namespace app\controllers;

use Yii;
use app\models\RfSampleDetails;
use app\models\RfMainService;
use app\models\RfSampleDetailsSearch;
use app\models\Calibration;
use app\models\Particulars;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RfSampleDetailsController implements the CRUD actions for RfSampleDetails model.
 */
class DetailsController extends Controller
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
     * Lists all RfSampleDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RfSampleDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RfSampleDetails model.
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
     * Creates a new RfSampleDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       

        $model = new RfSampleDetails();
      
        if ($model->load(Yii::$app->request->post())) {
           
            $calibration_name = Calibration::find()->where(['id' => $model->cal_id])->one();
            $amount = Particulars::find()->where(['id' => $model->cal_id])->one();
            $model->request_date = date('Y-m-d H:i:s');
            $total = $amount->fee*$model->quantity;
            $result = Yii::$app->mailer->compose()
            ->setFrom('customer@itdi.dost.gov.ph')
            ->setTo(array($model->email, 'beingalvinmerano@gmail.com'))
            ->setSubject('ITDI CUSTOMER SUPPORT')
            ->setHtmlBody('Good day! '.'<b>' .$model->customer_name.'</b>'.
            '<br> We have received your request for '.'<b>'.$calibration_name->sample_name .'</b>'.
            '. Here are the breakdown of your request:<br>'.
            '<table>'.'<tbody>'.
            '<tr>'.
            '<td><b>Calibration Name: </b></td>'.'<td>'.$calibration_name->sample_name.'</td>'.
            '</tr>'.
            '<tr>'.
            '<td><b>Quantity: </b></td>'.'<td>'.$model->quantity.'</td>'.
            '</tr>'.
            '<tr>'.
            '<td><b>Amount: </b></td>'.'<td>'.$amount->fee.'</td>'.
            '</tr>'.
            '<tr>'.
            '<td><b>Total: </b></td>'.'<td>'.$total.'</td>'.
            '</tr>'.
            'Thank you for inquiring<br>Regards,<br>National Metrology Division'.
            '</tbody>'.'</table>')

            ->send();
            $model->save();
            //  var_dump($total);die;
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $RfMainServicePost = Yii::$app->request->post('RfMainService');

            $calibrationModel = Calibration::findOne($RfMainServicePost['sample_name']);
           

            $particularModel = Particulars::findOne($RfMainServicePost['particulars']);

            $quantity = $RfMainServicePost['quantity'];
        }

        return $this->render('create', [
            'model' => $model,
            'calibrationModel' => $calibrationModel,
            'particularModel' => $particularModel,
            'quantity' => $quantity,
        ]);
    }

    /**
     * Updates an existing RfSampleDetails model.
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
     * Deletes an existing RfSampleDetails model.
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
     * Finds the RfSampleDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RfSampleDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RfSampleDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
