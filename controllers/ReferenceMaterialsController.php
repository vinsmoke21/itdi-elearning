<?php

namespace app\controllers;


use Yii;
use app\models\ptservices\PtCategories;
use app\models\referencematerials\PtReferenceMaterialsSearch;
use app\models\referencematerials\PtRfRequestSearch;
use app\models\referencematerials\PtRmCodeRequest;
use app\models\RfMainServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\ptservices\PtCodeRequest;
use app\models\ptservices\PtServices;
use app\models\ptservices\PtServicesSearch;
use app\models\ptservices\PtRequest;
use app\models\referencematerials\PtReferenceMaterials;
use app\models\referencematerials\PtRfRequest;
use app\modules\proficiencytesting\models\referencematerials\PtRmCodeRequest as ReferencematerialsPtRmCodeRequest;
use yii\data\ActiveDataProvider;
use \yii\web\Response;
use kartik\mpdf\Pdf;
use yii\helpers\Html;
use yii\helpers\VarDumper;

/*use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;*
 * RfMainServiceController implements the CRUD actions for RfMainService model.
 */

class ReferenceMaterialsController extends Controller
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

    // /**
    //  * Lists all RfMainService models.
    //  * @return mixed
    //  */
    // public function actionIndex()
    // {

    //     return $this->render('index', [
    //     ]);
    // }

    /**
     * Lists all ParticipantsInformation models.
     * @return mixed
     */
    public function actionIndex()
    {

        $checklist = new PtReferenceMaterials();
        $model =  PtReferenceMaterials::find()->all();       

        $dataProvider = new ActiveDataProvider([
            'query' => PtReferenceMaterials::find(),

        ]);

        if ($checklist->load(Yii::$app->request->post())) {

            $checklist->save();
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'checklist' => $checklist,



        ]);
    }

    /**
     * Creates a new TblCategory model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new PtRfRequest();
        $ptcode = new PtRmCodeRequest();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "RMs Request",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'ptcode' => $ptcode,

                    ]),

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "RMs Request",
                    'content' => '<span class="text-success">Join PT-Services success</span>',


                ];
            } else {
                return [
                    'title' => "RMs Request",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'ptcode' => $ptcode,
                    ]),

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */


            if ($model->load($request->post()) && $model->save()) {
 
                return $this->redirect(['summary', 'id' => $model->id]);;
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'ptcode' => $ptcode,
                ]);
            }
        }
    }

    public function actionRmprint($id)
    {


        $content = $this->renderPartial('rm-pdf');


        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            //Name for the file
            'filename' => 'ITDI-RM-FORM.PDF',
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssFile' => 'css/rfdetails.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            // 'methods' => [
            //     'SetHeader'=>['Krajee Report Header'],
            //     'SetFooter'=>['{PAGENO}'],
            // ]
            'methods' => [
                'SetTitle' => 'PT Request Form',
                // 'SetSubject' => 'Generating PDF files via yii2-mpdf extension has never been easy',
                'SetHeader' => ['Krajee Privacy Policy||Generated On: ' . date("r")],
                // 'SetFooter' => ['|Page {PAGENO}|'],
                // 'SetAuthor' => 'Kartik Visweswaran',
                // 'SetCreator' => 'Kartik Visweswaran',
                // 'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);

        // return the pdf output as per the destination setting
        // return $pdf->render();
        return $pdf->render('rm-pdf', [
            'ptcode' => $this->findModel($id),
            // 'services' => $services,
            // 'detailspdf' => $detailspdf,
        ]);
    }


    public function actionDetails()
    {
        $model = new PtRfRequest();
        $ptcode = new PtRmCodeRequest();



        if ($model->load(Yii::$app->request->post())) {
            $ptservices = PtReferenceMaterials::find()->where(['id' => $_POST['id']])->one(); //actual_stocks
            $model->date_inquiry = date('Y-m-d H:i:s');
            $result = PtRfRequest::find()->orderBy(['counter' => SORT_DESC])->limit(1)->all();
            $count = (count($result) == 0 || count($result) == null ? 1 : ((int)$result[0]['counter'] + 1));
            $model->transaction_number = 'ITDI-MIC-' . date('m-Y') . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
            $model->counter = $count;
            $model->transaction_type = 2;
            // var_dump($model);die;


            if (true) {

                if ($model->save()) {

                    $ptcode->request_id = $model->id;
                    $ptcode->amount = $ptservices->price;
                    $ptcode->pt_rm_id = $ptservices->id;
                    $ptcode->quantity = (int)$model->buyQuantity;

                    $ptcode->amount = $ptservices->price;
                    $total =  $ptcode->quantity * $ptcode->amount;
                    $ptcode->total_fee = $total;

                    $subTract =  $ptservices->actual_stocks - $ptcode->quantity;
                    $ptservices->actual_stocks =  $subTract;

                    $ptcode->save();
                    $ptservices->save();

                    $session = Yii::$app->session; // To hide id
                    $session->set('summary_id', $ptcode->id); // to hide ID

                    return $this->redirect(['summary']);
                }
            }
        }

        $id = Yii::$app->request->post('id');
        $services = PtReferenceMaterials::find()->where(['id' => $id])->one();

        return $this->render('details', ['services' => $services, 'ptcode' => $ptcode]);
    }


    public function actionRmBuy()
    {
        $model = new PtRfRequest();

        return $this->renderAjax('rm-buy', [
            'model' => $model,
        ]);
    }


    public function actionRequest()
    {
        $model = new PtRfRequest();
     
        $ptCodeIds = explode(',', $_POST['selected_ids']); // explode id

        if ($ptCodeIds == null) {
            return $this->redirect(['error']);
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->date_inquiry = date('Y-m-d H:i:s');
            $result = PtRfRequest::find()->orderBy(['counter' => SORT_DESC])->limit(1)->all();
            $count = (count($result) == 0 || count($result) == null ? 1 : ((int)$result[0]['counter'] + 1));
            $model->transaction_number = 'ITDI-MIC-' . date('m-Y') . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
            $model->counter = $count;
            $model->transaction_type = 2;
            $model->save();
           

            $ptCodeIds = array_filter($ptCodeIds); //remove empty value

            foreach ($ptCodeIds as $id) {
                $quantTy = explode(':', $id);
                $ptcode = new PtRmCodeRequest();
                $services = PtReferenceMaterials::find()->where(['id' => $quantTy[0]])->one();
                $ptcode->pt_rm_id = $quantTy[0];
                $ptcode->quantity = $quantTy[1];
                if( $ptcode->quantity == 0 || $ptcode->quantity == ''){
                    $ptcode->quantity = 1;
                }
                $ptcode->amount = $services->price;
                $ptcode->request_id = $model->id;
                $total =  $ptcode->quantity * $ptcode->amount;  

                if ($ptcode->quantity > $services->actual_stocks) {
                    return '<br>
                               Sorry, you can only buy max of ' . '<b>'.$services['actual_stocks'].'</b>'. '<br> <br>';
                } 

                $subTract =  $services->actual_stocks - $ptcode->quantity;
                $services->actual_stocks =  $subTract;
                $ptcode->total_fee = $total;

              
              
                $ptcode->save();
                $services->save();
            }



            $session = Yii::$app->session; // To hide id
            $session->set('summary_id', $ptcode->id); // to hide ID
            return $this->redirect(['summary']);
        }

        return $this->renderAjax('request', [
            'model' => $model,
        ]);
    }







    /**
     * Displays a single RfSampleDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSummary()
    {
        $session = Yii::$app->session; // To Hide ID

        $id = $session->get('summary_id'); // To HIde ID

        $test2 = PtRmCodeRequest::find()->where(['id' => $id])->one();

        $services = PtReferenceMaterials::find()->where(['id' => $test2['pt_rm_id']])->one();

        $request = PtRfRequest::find()->where(['id' => $test2['request_id']])->one();

        $total = $services->price;




        return $this->render('summary', [
            'ptcode' => $this->findModel($id),
            'services' => $services,
            'total' => $total,
            'request' => $request,

        ]);
    }




    public function actionPtMaterials()
    {

        return $this->render('pt-materials', []);
    }

    protected function findModel($id)
    {
        if (($ptcode = PtRmCodeRequest::findOne($id)) !== null) {
            return $ptcode;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
