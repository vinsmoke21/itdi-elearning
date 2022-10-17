<?php

namespace app\controllers;


use Yii;
use app\models\ptservices\PtCategories;
use app\models\RfMainService;
use app\models\RfMainServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\ptservices\PtCodeRequest;
use app\models\ptservices\PtServices;
use app\models\ptservices\PtServicesSearch;
use app\models\ptservices\PtRequest;
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

class PtServicesController extends Controller
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
        $checklist = new PtServices();
        $model = PtServices::find()->groupBy('category_id')->all();
        $category = PtCategories::find()->all();
        $servicecheck = PtServices::find()->all();


        // $cat = PtServices::find()->where(['category_id' => '0'])->orderBy(['id' => SORT_DESC])->limit(10)->all();
        $dataProvider = new ActiveDataProvider([
            'query' => PtServices::find(),

        ]);

        if ($checklist->load(Yii::$app->request->post())) {
            $checklist->save();
            var_dump($checklist);die;
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'servicecheck' => $servicecheck,
            'category' => $category,
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
        $model = new PtRequest();
        $ptcode = new PtCodeRequest();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Join PT-Services",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'ptcode' => $ptcode,

                    ]),

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Join PT-Services",
                    'content' => '<span class="text-success">Join PT-Services success</span>',


                ];
            } else {
                return [
                    'title' => "Join PT-Services",
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

    public function actionPtprint($id)
    {

        $session = Yii::$app->session; // To Hide ID
        $id = $session->get('ptprint_id'); // To HIde ID
        $test2 = PtCodeRequest::find()->where(['id' => $id])->one();
        $detailspdf = PtRequest::find()->where(['id' => $test2['request_id']])->one();
        // var_dump($detailspdf->id);die;
        $category = PtCategories::find()->where(['id' => $test2['categories_id']])->one();
        $services = PtServices::find()->where(['id' => $test2['code_id']])->one();
        $content = $this->renderPartial('pt-pdf');


        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            //Name for the file
            'filename' => 'ITDI-PT-FORM.PDF',
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
                // 'SetHeader' => ['Krajee Privacy Policy||Generated On: ' . date("r")],
                // 'SetFooter' => ['|Page {PAGENO}|'],
                // 'SetAuthor' => 'Kartik Visweswaran',
                // 'SetCreator' => 'Kartik Visweswaran',
                // 'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);

        // return the pdf output as per the destination setting
        // return $pdf->render();
        return $pdf->render('pt-pdf', [
            'ptcode' => $this->findModel($id),
            'services' => $services,
            'category' => $category,
            'detailspdf' => $detailspdf,
        ]);
    }


    public function actionDetails()
    {
        $model = new PtRequest();
        $ptcode = new PtCodeRequest();



        if ($model->load(Yii::$app->request->post())) {
            $ptservices = PtServices::find()->where(['id' => $_POST['id']])->one();
            $model->date_inquiry = date('Y-m-d H:i:s');
            $result = PtRequest::find()->orderBy(['counter' => SORT_DESC])->limit(1)->all();
            $count = (count($result) == 0 || count($result) == null ? 1 : ((int)$result[0]['counter'] + 1));
            $model->transaction_number = 'ITDI-MIC-' . date('m-Y') . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
            $model->counter = $count;


            if (true) {

                if ($model->save()) {

                    $ptcode->request_id = $model->id;
                    $ptcode->categories_id = $ptservices->category_id;
                    $ptcode->amount = $ptservices->price;
                    $ptcode->code_id = $ptservices->id;
                    $ptcode->save();

                    $session = Yii::$app->session; // To hide id

                    $session->set('summary_id', $ptcode->id); // to hide ID

                    return $this->redirect(['summary']);
                }
            }
        }

        $id = Yii::$app->request->post('id');
        $services = PtServices::find()->where(['id' => $id])->one();
        $category = PtCategories::find()->where(['id' => $services['category_id']])->one();

        return $this->render('details', ['services' => $services, 'category' => $category, 'ptcode' => $ptcode]);
    }


    public function actionPtJoin()
    {
        $model = new PtRequest();
        // var_dump($_POST);die;

        return $this->renderAjax('pt-join', [
            'model' => $model,
        ]);
    }


    public function actionRequest()
    {
        $model = new PtRequest();

        $ptCodeIds = explode(',', $_POST['selected_ids']); // explode id

        if ($model->load(Yii::$app->request->post())) {
            $model->date_inquiry = date('Y-m-d H:i:s');
            $result = PtRequest::find()->orderBy(['counter' => SORT_DESC])->limit(1)->all();
            $count = (count($result) == 0 || count($result) == null ? 1 : ((int)$result[0]['counter'] + 1));
            $model->transaction_number = 'ITDI-MIC-' . date('m-Y') . '-' . str_pad($count, 5, '0', STR_PAD_LEFT);
            $model->counter = $count;
            $model->save();

            $ptCodeIds = array_filter($ptCodeIds); //remove empty value

            foreach ($ptCodeIds as $id) {
                $ptcode = new PtCodeRequest();
                $services = PtServices::find()->where(['id' => $id])->one();

                $ptcode->code_id = $id;
                $ptcode->request_id = $model->id;
                $ptcode->amount = $services->price;
                $ptcode->categories_id = $services->category_id;
                $ptcode->save();
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

        $test2 = PtCodeRequest::find()->where(['id' => $id])->one();

        $category = PtCategories::find()->where(['id' => $test2['categories_id']])->one();
        $services = PtServices::find()->where(['id' => $test2['code_id']])->one();
        $request = PtRequest::find()->where(['id' => $test2['request_id']])->one();
        $total = $services->price;

  

        return $this->render('summary', [
            'ptcode' => $this->findModel($id),
            'services' => $services,
            'category' => $category,
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
        if (($ptcode = PtCodeRequest::findOne($id)) !== null) {
            return $ptcode;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
