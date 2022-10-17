<?php

namespace app\controllers;

use app\models\backend\Search;
use yii\helpers\Html;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\backend\Trainings;
use app\models\backend\Tblinquiry;
use app\models\backend\Pt_inquiry;
use app\models\backend\Pt_materials;
use app\models\backend\Pt_category;
use app\models\backend\Techinquiry;
use app\models\backend\Seminars;
use app\models\backend\Avp;
use app\models\backend\Category;
use app\models\backend\External;
use app\models\backend\ExternalSpeaker;
use app\models\backend\InternalSpeaker;
use app\models\backend\Pt_categories;
use app\models\backend\Webinar_inquiry;
use app\models\backend\Tech_category;
use app\models\backend\Technologies;
use app\models\backend\SearchTechnology;
use app\models\backend\ServicesCategory;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use app\models\LoginForm as Login;
use app\models\backend\Speaker;
use app\models\customer\ChecklistData;
use app\models\customer\ChecklistTraining;
use app\models\customer\Municipality;
use app\models\customer\Province;
use app\models\customer\Region;
use app\models\customer\TrainingBackground;
use Exception;
use mdm\admin\models\User;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use yii\helpers\Json;

use app\models\customer\Usersprofile;
use app\models\customer\WebinarCustomer;

date_default_timezone_set('Asia/Manila');
class PortalController extends Controller

{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'actions' => ['captcha', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {

        $tbl_seminar = Seminars::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $tbl_trainings = Trainings::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $tbl_trainings = Trainings::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $technologies = Technologies::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $pt_materials = Pt_materials::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(6)->all();
        $this->view->title = 'ITDI Portal';
        $tech_category = Tech_category::find()->all();
        $pt_category = Pt_categories::find()->all();
        $tbl_category = Category::find()->all();
        $seminarClass = new Seminars();
        $speaker = Speaker::find()->all();
        $seminar = $seminarClass->getSeminarsOrderedByCategory();


        return $this->render('index', [
            'tbl_seminar' => $tbl_seminar,
            'tbl_trainings' => $tbl_trainings,
            'tbl_category' => $tbl_category,
            'tech_category' => $tech_category,
            'technologies' => $technologies,
            'seminars' => $seminar,
            'pt_category' => $pt_category,
            'pt_materials' => $pt_materials,
            'speaker' => $speaker,

        ]);
    }


    public function actionTechnologies($id)
    {

        $request = Yii::$app->request;
        if ($request->isAjax) {
            $technologies = Technologies::find()->where(['category_id' => $id, ['status' => '0']])->orderBy(['id' => SORT_DESC])->limit(6)->all();
            $tech_category = Tech_category::findOne(['id' => $id]);
            return $this->renderAjax('ajax/technology', [
                'technologies' => $technologies,
                'tech_category' => $tech_category,
            ]);
        }
    }


    public function actionPtMaterials($id)
    {

        $request = Yii::$app->request;

        if ($request->isAjax) {
            $pt_materials = Pt_materials::find()->where(['category_id' => $id, ['status' => '0']])->orderBy(['id' => SORT_DESC])->limit(6)->all();
            $pt_category = Pt_category::findOne(['id' => $id]);

            return $this->renderAjax('ajax/proficiency', [
                'pt_materials' => $pt_materials,
                'pt_category' => $pt_category,
            ]);
        }
    }




    public function actionTechnologytransfer()
    {
        $technologies = Technologies::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(5)->all();
        $this->view->title = 'ITDI Portal';
        $tech_category = Tech_category::find()->all();
        $searchModel = new SearchTechnology();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('technologytransfer', [

            'tech_category' => $tech_category,
            'technologies' => $technologies,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }


    public function actionProficiencyTesting()
    {
        $pt_materials = Pt_Materials::find()->where(['status' => '0'])->orderBy(['id' => SORT_DESC])->limit(5)->all();
        $this->view->title = 'ITDI Portal';
        $pt_category = Pt_categories::find()->all();


        return $this->render('proficiency-testing', [

            'pt_category' => $pt_category,
            'pt_materials' => $pt_materials,


        ]);
    }



    public function actionTransfer($id)
    {
        if ($id) {
            $request = Yii::$app->request;
            $tech_category = Tech_category::find()->where(['id' => $id])->one();
            $query = Technologies::find();
            $count = $query->count();
            $pages = new Pagination(
                [
                    'totalCount' => $count,
                    'pageSize' => 6
                ]
            );


            $technologies = $query->offset($pages->offset)
                ->where(['category_id' => $id])->orderBy(['id' => SORT_DESC])
                ->limit($pages->limit)
                ->all();

            return $this->renderAjax('ajax/transfer', [

                'tech_category' => $tech_category,
                'technologies' => $technologies,
                'pages' => $pages,


            ]);
        } else {
            return $this->render('error', [
                'name' => '404',
                'message' => 'Invalid request',
            ]);
        }
    }



    /////// SEARCH BAR /////
    // public function actionTransfer($id, $title = null)
    // {
    //     if ($id) {
    //         $request = Yii::$app->request;
    //         $searchModel = new SearchTechnology();
    //         $searchParams = Yii::$app->request->queryParams;
    //         $searchParams['SearchTechnology']['title'] = $title;
    //         $searchParams['SearchTechnology']['category_id'] = $id;
    //         $dataProvider = $searchModel->search($searchParams);
    //         $tech_category = Tech_category::find()->where(['id' => $id])->one();
    //         $pages = $dataProvider->pagination;


    //         return $this->renderAjax('ajax/transfer', [

    //             'tech_category' => $tech_category,
    //             'technologies' => $dataProvider->getModels(),
    //             'pages' => $pages,
    //             'searchModel' => $searchModel,
    //             'dataProvider' => $dataProvider,


    //         ]);
    //         } else {
    //         return $this->render('error', [
    //             'name' => '404',
    //             'message' => 'Invalid request',
    //         ]);
    //     }
    // }


    public function actionTechnology($id)
    {

        if ($id) {

            $tech_category = Tech_category::find()->where(['id' => $id])->one();
            $technologies = Technologies::find()->where(['category_id' => $id])->orderBy(['id' => SORT_DESC])->limit(6)->all();

            $model = Technologies::find()
                ->where(['category_id' => $id])
                ->all();

            return $this->renderAjax('ajax/technology', [
                'model' => $model,
                'tech_category' => $tech_category,
                'technologies' => $technologies,

            ]);
        } else {
            return $this->render('error', [
                'name' => '404',
                'message' => 'Invalid request',
            ]);
        }
    }


    public function actionProficiency($id)
    {

        if ($id) {

            $pt_category = Pt_category::find()->where(['id' => $id])->one();
            $pt_materials = Pt_materials::find()->where(['category_id' => $id])->orderBy(['id' => SORT_DESC])->limit(6)->all();

            $model = Pt_materials::find()
                ->where(['category_id' => $id])
                ->all();

            return $this->renderAjax('ajax/proficiency', [
                'model' => $model,
                'pt_category' => $pt_category,
                'pt_materials' => $pt_materials,

            ]);
        } else {
            return $this->render('error', [
                'name' => '404',
                'message' => 'Invalid request',
            ]);
        }
    }


    public function actionSeminars($id)
    {
        if ($id) {

            $request = Yii::$app->request;
            $category = Category::findOne($id);


            $model = Yii::$app->db->createCommand('SELECT * FROM 
            (SELECT id, category_id, filename, title, description, datesched, 
            payment, mode, customized, status, "seminar" as train_or_sem FROM itdidb_cportal.tbl_seminars tbl_seminars
            UNION SELECT id, category_id, filename, title, description, datesched, 
            payment, mode, customized, status, "training" as train_or_sem FROM itdidb_cportal.tbl_trainings 
            tbl_trainings) dummy_table WHERE category_id = :id AND  status = 0 ORDER BY datesched DESC LIMIT 6')
                ->bindValue(':id', $id)
                ->queryAll();

            return $this->renderAjax('ajax/seminars-trainings', [
                'model' => $model,
                'category' => $category,
                // 'externals' => $externals,
                // 'internals' => $internals,
                // 'checklisted' => $checklisted,
                // 'externalSem' => $externalSem,
                // 'internalSem' => $internalSem,
                // 'checklistSem' => $checklistSem,
            ]);
        } else {
            return $this->render('error', [
                'name' => '404',
                'message' => 'Invalid request',
            ]);
        }
    }


    public function actionVideo($id)
    {
        if ($id) {

            $request = Yii::$app->request;

            $tbl_category = Category::findOne($id);

            $model = Yii::$app->db->createCommand('SELECT * FROM 
            (SELECT id, cat_id, filename, title,  
            "avp" as train_or_sem FROM itdidb_cportal.avp avp 
            ) dummy_table WHERE cat_id = :id ORDER BY')
                ->bindValue(':id', $id)
                ->queryAll();

            return $this->renderAjax('ajax/seminars-trainings', [
                'model' => $model,
                'category' => $tbl_category,
                // 'request' => $request->getIsPost(),
            ]);
        } else {
            return $this->render('error', [
                'name' => '404',
                'message' => 'Invalid request',
            ]);
        }
    }



    public function actionInquiry()
    {

        $tblinquiry = new Tblinquiry;
        $services = ServicesCategory::find()->all();
        $tblinquiry->date_inquiry = date('Y-m-d H:i:s');
        $submittedSuccessfully = false;
        $tblinquiry->status_id = 3;

        if ($tblinquiry->load(Yii::$app->request->post())) {

            if ($tblinquiry->services_id = 2) {


                $result = Yii::$app->mailer->compose()

                    ->setFrom('customer@itdi.com.ph')
                    ->setTo(array($tblinquiry->emails, 'bentot.lascuna21@gmail.com'))
                    ->setSubject('ITDI CUSTOMER SUPPORT')
                    ->setHtmlBody('Good day Mr/Ms. ' . '<b>' . $tblinquiry->name . '!</b>' .
                        ' We have received your inquiry regarding to our product/services.' .
                        '  Our customer support will update you soon.<br><br>Regards,<br>Industrial Technology Development Institute')
                    ->send();

                if (true) {


                    $tblinquiry->save();
                    $submittedSuccessfully = true;
                    $tblinquiry = new Tblinquiry();
                }
            } else {
                $result = Yii::$app->mailer->compose()
                    ->setFrom('customer@itdi.com.ph')
                    ->setTo($tblinquiry->emails)
                    ->setSubject('ITDI CUSTOMER SUPPORT')
                    ->setHtmlBody('Good day Mr/Ms. ' . '<b>' . $tblinquiry->name . '</b>' .
                        ' We have received your inquiry regarding to our product/services.' .
                        '  Our customer support will update you soon.<br><br>Regards,<br>Industrial Technology Development Institute')
                    ->send();

                if (true) {


                    $tblinquiry->save();
                    $submittedSuccessfully = true;
                    $tblinquiry = new Tblinquiry();
                }
            }
        }




        return $this->render('inquiry', [
            'tblinquiry' => $tblinquiry,
            'services' => $services,
            'submittedSuccessfully' => $submittedSuccessfully,
        ]);
    }



    // change services id
    public function actionInquire()
    {
        $tblinquiry = new Tblinquiry;
        $services = ServicesCategory::find()->all();
        $tblinquiry->date_inquiry = date('Y-m-d H:i:s');
        $submittedSuccessfully = false;
        $tblinquiry->services_id = 2;
        $tblinquiry->status_id = 3;
        // var_dump($tblinquiry->services_id);die;

        if ($tblinquiry->load(Yii::$app->request->post())) {

            if ($tblinquiry->services_id = 2) {


                $result = Yii::$app->mailer->compose()

                    ->setFrom('customer@itdi.com.ph')
                    ->setTo(array($tblinquiry->emails, 'bentot.lascuna21@gmail.com'))
                    ->setSubject('ITDI CUSTOMER SUPPORT')
                    ->setHtmlBody('Good day Mr/Ms. ' . '<b>' . $tblinquiry->name . '</b>' .
                        ' We have received your inquiry regarding to our product/services.' .
                        '  Our customer support will update you soon.<br><br>Regards,<br>Industrial Technology Development Institute')
                    ->send();

                if (true) {


                    $tblinquiry->save();
                    $submittedSuccessfully = true;
                    $tblinquiry = new Tblinquiry();
                }
            } else {
                $result = Yii::$app->mailer->compose()
                    ->setFrom('customer@itdi.com.ph')
                    ->setTo($tblinquiry->emails)
                    ->setSubject('ITDI CUSTOMER SUPPORT')
                    ->setHtmlBody('Good day Mr/Ms. ' . '<b>' . $tblinquiry->name . '</b>' .
                        ' We have received your inquiry regarding to our product/services.' .
                        '  Our customer support will update you soon.<br><br>Regards,<br>Industrial Technology Development Institute')
                    ->send();

                if (true) {


                    $tblinquiry->save();
                    $submittedSuccessfully = true;
                    $tblinquiry = new Tblinquiry();
                }
            }
        }




        return $this->render('inquire', [
            'tblinquiry' => $tblinquiry,
            'services' => $services,
            'submittedSuccessfully' => $submittedSuccessfully,
        ]);
    }





    public function actionDetails()
    {

        $id = Yii::$app->request->post('id');
        $webinar_inquiry = new Webinar_inquiry();
        $model = new Usersprofile();
        $tbl_seminars = Seminars::find()->where(['id' => $id])->one();

        if ($tbl_seminars == null) {
            return $this->redirect(['error']);
        }

        $fee = $tbl_seminars->payment;
        $region = Region::find()->all();
        $province = Province::find()->all();
        $municipality = Municipality::find()->all();
        $submittedSuccessfully = false;
        $background = TrainingBackground::find()->all();
        $checklist = new ChecklistData();


        if ($fee != 0 || $fee != '') {

            if ($webinar_inquiry->load(Yii::$app->request->post())) {
                $id = Yii::$app->request->post('id');
                $webinar_inquiry->seminar_id = $id;
                $fee = Seminars::find()->where(['id' => $_POST['id']])->one();
                $webinar_inquiry->session_id = Yii::$app->security->generateRandomString(33);
                $webinar_inquiry->password = Yii::$app->security->generateRandomString(33);
                $total = $fee->payment * $webinar_inquiry->nop;
                $webinar_inquiry->payment = $total;
                $title = Seminars::find()->where(['id' => $_POST['id']])->one();
                $webinar_inquiry->date_inquiry = date('Y-m-d H:i:s');
                $webinar_inquiry->u_id = $title->u_id;
                $webinar_inquiry->seminar_title = $title->title;

                // with email
                if ($webinar_inquiry->receiver_email == '' && $webinar_inquiry->mop != 'E-payment') {
                    $webinar_inquiry->receiver_email = true;
                    $webinar_inquiry->receiver_email = 'No Email Address';
                    $webinar_inquiry->save();
                    return '<br>
                            <b> Contact or Visit ITDI office for request of validation and payment. Thank you!</b>
                            <br>
                            <br>';
                } else {

                    $result = Yii::$app->mailer->compose()
                        ->setFrom('customer@itdi.com.ph')
                        ->setTo($webinar_inquiry->receiver_email)
                        ->setSubject('ITDI CUSTOMER SUPPORT')
                        ->setHtmlBody('<b>Dear Participant, Thank you for your interest in our training program.</b>
                            : ' .   '<table>' . '<tbody>' .
                            '. Here is the breakdown of your request:<br>' .
                            '<tr>' .
                            '<td><b>Title: </b></td>' . '<td>' . $title['title'] . '</td>' .
                            '</tr>' .
                            '<tr>' .
                            '<td><b>Number of Participants: </b></td>' . '<td>' . $webinar_inquiry['nop'] . '</td>' .
                            '</tr>' .
                            '<tr>' .
                            '<td><b>Fee:</b></td>' . '<td>' . $fee['payment'] . '</td>' .
                            '</tr>' .
                            '<tr>' .
                            '<td><b>Total of Payment: </b></td>' . '<td>' . $total . '</td>' .
                            '</tr>' .
                            'Thank you for registering<br>Regards,<br>ITDI' .
                            '</tbody>' . '</table>')
                        ->send();

                    if (true) {


                        $webinar_inquiry->save();

                        return '<br>
                                <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                                <br>
                                <br>';
                    }
                }
            }
        } else {

            $id = Yii::$app->request->post('id');
            $tbl_seminars = Seminars::find()->where(['id' => $id])->one();
            $fee = $tbl_seminars->payment;
            $model->seminar_id = $tbl_seminars->id;
            $model->title_of_training = $tbl_seminars->title;
            $model->transaction_id = 'FREE';
            $model->payment = 0;
            $background = TrainingBackground::find()->all();
            $checklist = new ChecklistData();
            $webinar = Seminars::find()->all();
            $tbl_seminars = Seminars::find()->where(['id' => $webinar])->one();
            $checklistT = ChecklistTraining::find()->where(['seminar_id' => $tbl_seminars['id']])->all();
            $link = Seminars::find()->where(['id' => $model['seminar_id']])->one();
            $map = 'https://www.google.com/maps/dir//F3Q2%2BV7P+Industrial+Technology+Development+Institute,+General+Santos+Ave,+Taguig,+Metro+Manila/@14.4875454,121.0449656,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3397cf13f2815617:0x62cd153863a634cc!2m2!1d121.050695!2d14.48971';
            $dost = 'https://itdi.dost.gov.ph/images/TransparencySeal/ITDI-DOST_MAP_a.jpg';

            if ($checklistT != null) {
                var_dump($checklistT);
                die;
                if ($model->load(Yii::$app->request->post()) && $checklist->load(Yii::$app->request->post())) {

                    if ($model->save()) {

                        $list = $checklist->training_background_id;

                        if ($list != NULL) {

                            foreach ($list as $y) {

                                $check = new ChecklistData();

                                $check->training_background_id = $y;
                                $check->userprofile_id = $model->id;
                                $check->save();
                            }
                        }
                    }

                    // $submittedSuccessfully = true;


                    if ($link->mode == 2) {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
                                'Here are the address of DOST-ITDI.<br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map . '<br><br>' .
                                'DOST Map: ' . $dost . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                                    ')
                            ->send();

                        if (true) {

                            $submittedSuccessfully = true;
                            $model->save();
                            return '<br>
                                <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                                <br>
                                <br>';

                            // $model = new Usersprofile();
                        }
                    } else {
                        // var_dump('test');
                        // die;
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
                                'Here are the zoom link to enter on your training.<br>' .
                                'Zoom Link: </b></td>' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                                        ')
                            ->send();

                        if (true) {

                            $submittedSuccessfully = true;
                            $model->save();
                            return '<br>
                                <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                                <br>
                                <br>';
                        }
                    }
                }
            } else {

                if ($model->load(Yii::$app->request->post())) {
                    var_dump($model->payment);
                    die;

                    $submittedSuccessfully = true;


                    if ($link->mode == 'Face to Face') {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
                                'Here are the address of DOST-ITDI.<br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                                    ')
                            ->send();

                        if (true) {


                            $model->save();
                            return '<br>
                                <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                                <br>
                                <br>';

                            // $model = new Usersprofile();
                        }
                    } else {
                        // var_dump('test');
                        // die;
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
                                'Here are the zoom link to enter on your training.<br>' .
                                'Zoom Link: </b></td>' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                                        ')
                            ->send();

                        if (true) {

                            $model->save();
                            return '<br>
                                <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                                <br>
                                <br>';
                        }
                    }
                }
            }
        }



        if ($tbl_seminars == null) {
            throw new NotFoundHttpException('No item found', 404);
        }
        $tbl_category = Category::find()->where(['id' => $tbl_seminars['category_id']])->one();


        return $this->render('details', [
            'tbl_seminars' => $tbl_seminars,
            'tbl_category' => $tbl_category,
            'model' => $model,
            'region' => $region,
            'province' => $province,
            'municipality' => $municipality,
            'submittedSuccessfully' => $submittedSuccessfully,
            'background' => $background,
            'checklist' => $checklist,

        ]);
    }







    public function actionTrainingDetails()
    {

        $id = Yii::$app->request->post('id');
        $webinar_inquiry = new Webinar_inquiry();
        $model = new Usersprofile();
        $tbl_trainings = Trainings::find()->where(['id' => $id])->one();

        if ($tbl_trainings == null) {
            return $this->redirect(['error']);
        }
        $checklisted = ChecklistTraining::find()->where(['training_id' => $tbl_trainings['id']])->all();
        // external speaker
        $externals = ExternalSpeaker::find()->where(['training_id' => $tbl_trainings['id']])->all();
        // internal speaker
        $internals = InternalSpeaker::find()->where(['training_id' => $tbl_trainings['id']])->all();
        // var_dump($internalS);die;






        $fee = $tbl_trainings->payment;
        $region = Region::find()->all();
        $province = Province::find()->all();
        $municipality = Municipality::find()->all();
        $submittedSuccessfully = false;
        $background = TrainingBackground::find()->all();
        $checklist = new ChecklistData();



        if ($fee == 0 || $fee == '') {  // for free webinar 


            $id = Yii::$app->request->post('id');
            $model = new Usersprofile();
            $tbl_trainings = Trainings::find()->where(['id' => $id])->one();
            $fee = $tbl_trainings->payment;
            $model->training_id = $tbl_trainings->id;
            $model->title_of_training = $tbl_trainings->title;
            $model->transaction_id = 'FREE';
            $model->payment = 0;
            $background = TrainingBackground::find()->all();
            $checklist = new ChecklistData();
            $training = Trainings::find()->where(['id' => $id])->one();
            // $seminar = Semina::find()->where(['id' => $id])->one();
            $checklistT = ChecklistTraining::find()->where(['training_id' => $training['id']])->all();

            // $checklistS = ChecklistTraining::find()->where(['seminar_id' => $model['seminar_id']])->all();
            $link = Trainings::find()->where(['id' => $model['training_id']])->one();
            $map = 'https://www.google.com/maps/dir//F3Q2%2BV7P+Industrial+Technology+Development+Institute,+General+Santos+Ave,+Taguig,+Metro+Manila/@14.4875454,121.0449656,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3397cf13f2815617:0x62cd153863a634cc!2m2!1d121.050695!2d14.48971';
            $dost = 'https://itdi.dost.gov.ph/images/TransparencySeal/ITDI-DOST_MAP_a.jpg';

            if ($checklistT != null) {

                if ($model->load(Yii::$app->request->post()) && $checklist->load(Yii::$app->request->post())) {


                    if ($model->save()) {

                        $list = $checklist->training_background_id;

                        if ($list != NULL) {

                            foreach ($list as $y) {

                                $check = new ChecklistData();

                                $check->training_background_id = $y;
                                $check->userprofile_id = $model->id;
                                $check->save();
                            }
                        }
                    }

                    // $submittedSuccessfully = true;


                    if ($link->mode == 2) {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' . '
                                We thank you for your interest in our training program.' . '<br>' .
                                'Here are the address of DOST-ITDI.' . '<br><br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map . '<br><br>' .
                                'DOST Map: ' . $dost . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                            ')
                            ->send();

                        if (true) {

                            $submittedSuccessfully = true;
                            $model->save();
                            return '<br>
                            <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                            <br>
                            <br>';

                            // $model = new Usersprofile();
                        }
                    } else {
                        // var_dump('test');
                        // die;
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear' . $model->firstname . ',' . '<br><br>' .
                                'We thank you for your interest in our training program.' . '<br>' .
                                ' Here are the zoom link to enter in our training.' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                                ')
                            ->send();
                        if (true) {

                            $submittedSuccessfully = true;
                            $model->save();
                            return '<br>
                        <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                        <br>
                        <br>';
                        }
                    }
                }
            } else {

                if ($model->load(Yii::$app->request->post())) {

                    $submittedSuccessfully = true;


                    if ($link->mode == 2) {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('TRAINING CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear' . $model->firstname . ',' . '<br><br>' .
                                'We thank you for your interest in our training program.' . '<br>' .
                                'Here are the address of DOST-ITDI.' . '<br><br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City,  Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map .
                                '<br>' .
                                'DOST Map: ' . $dost .
                                '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                            ')
                            ->send();

                        if (true) {


                            $model->save();
                            return '<b><br>' . '<center>' . 'Details sent!, Kindly check your email for further instructions. Thank you!' . '</center>' . '<br></b>';
                        }
                    } else {
                        // var_dump('test');
                        // die;
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('TRAINING CUSTOMER SUPPORT')
                            ->setHtmlBody('Dear' . $model->firstname . ',' . '<br><br>' .
                                'We thank you for your interest in our training program.' . '<br>' .
                                'Here are the zoom link to enter in our training.' .  $link['zoom_link'] .
                                '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                                ')
                            ->send();

                        if (true) {

                            $model->save();
                            return '<b><br>' . '<center>' . 'Details sent!, Kindly check your email for further instructions. Thank you!' . '</center>' . '<br></b>';
                        }
                    }
                }
            }
        } else {

            // for regular customer with payment

            if ($webinar_inquiry->load(Yii::$app->request->post())) {
                $id = Yii::$app->request->post('id');
                $webinar_inquiry->training_id = $id;
                $fee = Trainings::find()->where(['id' => $_POST['id']])->one();
                $webinar_inquiry->session_id = Yii::$app->security->generateRandomString(33);
                $webinar_inquiry->password = Yii::$app->security->generateRandomString(33);
                $total = $fee->payment * $webinar_inquiry->nop;
                $webinar_inquiry->payment = $total;
                $title = Trainings::find()->where(['id' => $_POST['id']])->one();
                $webinar_inquiry->date_inquire = date('Y-m-d H:i:s');
                $webinar_inquiry->u_id = $title->u_id;
                $webinar_inquiry->training_title = $title->title;

                // with email
                if ($webinar_inquiry->receiver_email == '' && $webinar_inquiry->mop != 'E-payment') {
                    $webinar_inquiry->receiver_email = true;
                    $webinar_inquiry->receiver_email = 'No Email Address';
                    $webinar_inquiry->save();
                    return '<br>' . 'Dear ' . $webinar_inquiry->name . ',' . '<br><br>' .
                        'Contact or Visit ITDI office for request of validation and payment. Thank you!' . '<br>';
                } else {

                    $result = Yii::$app->mailer->compose()
                        ->setFrom('customer@itdi.com.ph')
                        ->setTo($webinar_inquiry->receiver_email)
                        ->setSubject('ITDI CUSTOMER SUPPORT')
                        ->setHtmlBody('<b>' . 'Dear ' . $webinar_inquiry->name . ',' . '</b>' . '<br><br>
                            We thank you for making a reservation to the training with the following details.
                            <table style = "border: 1px solid black; border-collapse:collapse;"> 

                            <tr>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Training Title </b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Number of Participants </th> 
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Fee</b></th>
                            <th style = "border: 1px solid black; border-collapse:collapse;"><b>Total of Payment</b></th>
                            </tr>
                            
                            <tr>
                            <td style = "border: 1px solid black; border-collapse:collapse;  text-align: center;">' . $title['title'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $webinar_inquiry['nop'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $fee['payment'] . '</td>
                            <td style = "border: 1px solid black; border-collapse:collapse;   text-align: center;">' . $total . '</td>
                            </tr>

                            </table>

                            <br><br>
                            Thank you for registering<br>Regards,<br>ITDI
                            ')
                        ->send();

                    if (true) {
                        $webinar_inquiry->save();
                        return '<b><br>' . '<center>' . 'Details sent!, Kindly check your email for further instructions. Thank you!' . '</center>' . '<br></b>';
                    }
                }
            }
        }


        if ($tbl_trainings == null) {
            throw new NotFoundHttpException('No item found', 404);
        }
        $tbl_category = Category::find()->where(['id' => $tbl_trainings['category_id']])->one();


        return $this->render('training-details', [
            'tbl_trainings' => $tbl_trainings,
            'tbl_category' => $tbl_category,
            'model' => $model,
            'region' => $region,
            'province' => $province,
            'municipality' => $municipality,
            'submittedSuccessfully' => $submittedSuccessfully,
            'background' => $background,
            'checklist' => $checklist,
            'externals' => $externals,
            'internals' => $internals,
            'checklisted' => $checklisted,



        ]);
    }

    //Depdrop of Region,Province and Municipality - START
    //Child 1
    public function actionProvince()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];

        if (isset($_POST['depdrop_parents'])) {
            $parents = ($_POST['depdrop_parents']);
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Province::getProvinceList($cat_id);

                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    //Child 2
    public function actionMunicipality()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = ($_POST['depdrop_parents']);
            if (!empty($parents)) {
                $cat_id = (!empty($parents[0])) ? $parents[0] : null;
                $subcat_id = (!empty($parents[1])) ? $parents[1] : null;
                if ($cat_id !== null && $subcat_id !== null) {
                    $out = Municipality::getMunicipalityList($cat_id, $subcat_id);
                    return json_encode(['output' => $out, 'selected' => '']);
                }
            }
        }
        return json_encode(['output' => '', 'selected' => '']);
    }

    //Depdrop of Region,Province and Municipality - END

    /////////////////TRAINING EMAIL//////////////////////
    public function actionFree()
    {

        $model = new Usersprofile();
        $region = Region::find()->all();
        $province = Province::find()->all();
        $municipality = Municipality::find()->all();
        $submittedSuccessfully = false;
        $background = TrainingBackground::find()->all();
        $checklist = new ChecklistData();
        $training = Trainings::find()->all();
        $tbl_trainings = Trainings::find()->where(['id' => $_GET['id']])->one();
        $tbl_seminars = Seminars::find()->where(['id' => $_GET['id']])->one();
        $checklist = new ChecklistData();
        if ($tbl_trainings != null) {
            $checklistT = ChecklistTraining::find()->where(['training_id' => $tbl_trainings['id']])->all();
        }


        if ($tbl_seminars != null) {
            $checklistS = ChecklistTraining::find()->where(['seminar_id' => $tbl_seminars['id']])->all();
        } else {
            $checklistS = '';
        }



        if ($model->load(Yii::$app->request->post())) {
            $submittedSuccessfully = true;
        }


        return $this->renderAjax('free', [
            'model' => $model,
            'region' => $region,
            'province' => $province,
            'municipality' => $municipality,
            'submittedSuccessfully' => $submittedSuccessfully,
            'background' => $background,
            'checklist' => $checklist,
            'tbl_trainings' => $tbl_trainings,
            'training' => $training,
            'checklist' => $checklist,
            'checklistT' => $checklistT,
            'checklistS' => $checklistS,
            'background' => $background,


        ]);
    }


    // public function actionFree()
    // {

    //     $model = new Usersprofile();
    //     $region = Region::find()->all();
    //     $province = Province::find()->all();
    //     $municipality = Municipality::find()->all();
    //     $submittedSuccessfully = false;
    //     $background = TrainingBackground::find()->all();
    //     $checklist = new ChecklistData();
    //     $training = Trainings::find()->all();
    //     $tbl_trainings = Trainings::find()->where(['id' => $training])->one();
    //     $fee = $tbl_trainings->payment;
    //     $checklist = new ChecklistData();
    //     $checklistT = ChecklistTraining::find()->where(['training_id' => $tbl_trainings['id']])->all();
    //     $link = Trainings::find()->where(['id' => $tbl_trainings['id']])->one();
    //     $model->transaction_id = 'FREE';
    //     $model->payment = 'FREE';
    //     $model->training_id = $link->id;
    //     $model->payment = $link->payment;
    //     $map = 'https://www.google.com/maps/dir//F3Q2%2BV7P+Industrial+Technology+Development+Institute,+General+Santos+Ave,+Taguig,+Metro+Manila/@14.4875454,121.0449656,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3397cf13f2815617:0x62cd153863a634cc!2m2!1d121.050695!2d14.48971';
    //     $dost = 'https://itdi.dost.gov.ph/images/TransparencySeal/ITDI-DOST_MAP_a.jpg';

    //     // $link = Trainings::find()->where(['id' => $model['training_id']])->one();
    //     // $map = 'https://www.google.com/maps/dir//F3Q2%2BV7P+Industrial+Technology+Development+Institute,+General+Santos+Ave,+Taguig,+Metro+Manila/@14.4875454,121.0449656,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3397cf13f2815617:0x62cd153863a634cc!2m2!1d121.050695!2d14.48971';

    //     if ($checklistT != null) {


    //         if ($model->load(Yii::$app->request->post()) && $checklist->load(Yii::$app->request->post())) {

    //             if ($model->save()) {


    //                 $list = $checklist->training_background_id;

    //                 if ($list != NULL) {

    //                     foreach ($list as $i => $lists) {
    //                         $check = new ChecklistData();
    //                         $check->training_background_id = (int)$lists;
    //                         $check->userprofile_id = $model->id;
    //                         $check->save();
    //                     }
    //                 }
    //             }

    //             $submittedSuccessfully = true;


    //             if ($link->mode == 'Face to Face') {
    //                 $result = Yii::$app->mailer->compose()
    //                     ->setFrom('customer@itdi.com.ph')
    //                     ->setTo($model->email)
    //                     ->setSubject('ITDI CUSTOMER SUPPORT')
    //                     ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
    //                         'Here are the address of DOST-ITDI.<br>' .
    //                         'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
    //                         '<br>' .
    //                         'Google Map: ' . $map . '<br><br>' .
    //                         'DOST Map: ' . $dost . '<br><br>' .
    //                         'Thank you for registering<br>Regards,<br>ITDI' . '
    //                 ')
    //                     ->send();

    //                 if (true) {


    //                     $model->save();
    //                     $model = new Usersprofile();
    //                 }
    //             } else {
    //                 $result = Yii::$app->mailer->compose()
    //                     ->setFrom('customer@itdi.com.ph')
    //                     ->setTo($model->email)
    //                     ->setSubject('ITDI CUSTOMER SUPPORT')
    //                     ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
    //                         'Here are the zoom link to enter on your training.<br>' .
    //                         'Zoom Link: </b></td>' . $link['zoom_link'] . '<br><br>' .
    //                         'Thank you for registering<br>Regards,<br>ITDI' . '
    //                     ')
    //                     ->send();

    //                 if (true) {


    //                     $model->save();
    //                     $model = new Usersprofile();
    //                 }
    //             }
    //         }
    //     } else {

    //         if ($model->load(Yii::$app->request->post())) {

    //             if ($link->mode == 'Face to Face') {
    //                 $result = Yii::$app->mailer->compose()
    //                     ->setFrom('customer@itdi.com.ph')
    //                     ->setTo($model->email)
    //                     ->setSubject('ITDI CUSTOMER SUPPORT')
    //                     ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
    //                         'Here are the address of DOST-ITDI.<br>' .
    //                         'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
    //                         '<br>' .
    //                         'Google Map: ' . $map . '<br><br>' .
    //                         'Thank you for registering<br>Regards,<br>ITDI' . '
    //                 ')
    //                     ->send();

    //                 if (true) {

    //                     $submittedSuccessfully = true;
    //                     $model->save();
    //                     $model = new Usersprofile();
    //                 }
    //             } else {
    //                 $result = Yii::$app->mailer->compose()
    //                     ->setFrom('customer@itdi.com.ph')
    //                     ->setTo($model->email)
    //                     ->setSubject('ITDI CUSTOMER SUPPORT')
    //                     ->setHtmlBody('Dear Participant, Thank you for your interest in our training program.' .
    //                         'Here are the zoom link to enter on your training.<br>' .
    //                         'Zoom Link: </b></td>' . $link['zoom_link'] . '<br><br>' .
    //                         'Thank you for registering<br>Regards,<br>ITDI' . '
    //                     ')
    //                     ->send();

    //                 if (true) {

    //                     $submittedSuccessfully = true;
    //                     $model->save();
    //                     $model = new Usersprofile();
    //                 }
    //             }
    //         }
    //     }




    //     return $this->renderAjax('free', [
    //         'model' => $model,
    //         'region' => $region,
    //         'province' => $province,
    //         'municipality' => $municipality,
    //         'submittedSuccessfully' => $submittedSuccessfully,
    //         'background' => $background,
    //         'checklist' => $checklist,
    //         'tbl_trainings' => $tbl_trainings,
    //         'training' => $training,
    //         'fee' => $fee,
    //         'checklist' => $checklist,
    //         'checklistT' => $checklistT,
    //         'background' => $background,


    //     ]);
    // }

    ////////////////SEMINAR EMAIL//////////////////////
    public function actionSeminarInquiry()
    {
        $webinar_inquiry = new Webinar_inquiry();



        return $this->renderAjax('seminar-inquiry', [
            'webinar_inquiry' => $webinar_inquiry,
        ]);
    }

    ////////////////MIC INQUIRY//////////////////////
    public function actionPtInquiry()
    {
        $pt_inquiry = new Pt_inquiry();
        $submittedSuccessfully = false;


        return $this->renderAjax('pt-inquiry', [
            'pt_inquiry' => $pt_inquiry,
            'submittedSuccessfully' => $submittedSuccessfully
        ]);
    }







    /////////////////TRAINING EMAIL//////////////////////
    public function actionTrainingInquiry()
    {


        $webinar_inquiry = new Webinar_inquiry();
        $submittedSuccessfully = false;


        if ($webinar_inquiry->load(Yii::$app->request->post())) {
            $submittedSuccessfully = true;
        }


        return $this->renderAjax('training-inquiry', [
            'webinar_inquiry' => $webinar_inquiry,
            'submittedSuccessfully' => $submittedSuccessfully,
        ]);
    }



    ////////////////TECHNOLOGY INQURY//////////////////////

    public function actionTechinquiry()
    {

        $techinquiry = new Techinquiry();
        $technology = Technologies::find()->where(['id' => $techinquiry->tech_id])->one();



        if ($techinquiry->load(Yii::$app->request->post())) {

            $id = Yii::$app->request->post('id');

            $techinquiry->tech_id = $id;


            if ($techinquiry->email == '') {
            } else {

                $result = Yii::$app->mailer->compose()
                    ->setFrom('customer@itdi.dost.gov.ph')
                    ->setTo($techinquiry->email)
                    ->setSubject('ITDI TECHNOLOGY TRANSFER SUPPORT')
                    ->setHtmlBody('<b>Your details has been received! Our customer support will update you soon.</b>')
                    ->send();

                if (true) {

                    if ($techinquiry->save()) {
                    }


                    return '<br>
                    <b> Details sent! Kindly check your email for further instructions. Thank you!</b>
                    <br>
                    <br>';
                    // return $this->redirect(['technology-details', 'id' => $id]);

                }
            }
        }
        return $this->renderAjax('techinquiry', [
            'techinquiry' => $techinquiry,
            'technology' => $technology,
        ]);
    }



    public function actionTrainings()
    {
        $tbl_trainings = Trainings::find()->where(['status' => '0'])->orderBy(['datesched' => SORT_DESC])->all();
        $tbl_category = Category::find()->all();
        $avp = Avp::find()->all();
        $tbl_seminars = Seminars::find()->where(['status' => '0'])->orderBy(['datesched' => SORT_DESC])->all();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $tbl_trainings,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id']

            ],
        ]);


        return $this->render('trainings', [
            'tbl_trainings' => $tbl_trainings,
            'dataProvider' => $dataProvider,
            'tbl_category' => $tbl_category,
            'avp' => $avp,
            'tbl_seminars' => $tbl_seminars,
        ]);
    }


    public function actionTechnologyDetails()
    {
        $techinquiry = new Techinquiry();



        if ($techinquiry->load(Yii::$app->request->post())) {

            $id = Yii::$app->request->post('id');
            // $technology = Technologies::find()->where(['id' => $techinquiry->tech_id])->one();
            $technology = Technologies::findOne(['id' => $id]);
            $techinquiry->tech_id = $id;
            $techinquiry->tech_title = $technology->title;
            $techinquiry->timestamp = date('Y-m-d H:i:s');



            $result = Yii::$app->mailer->compose()
                ->setFrom('customer@itdi.com.ph')
                ->setTo($techinquiry->email)
                ->setSubject('ITDI CUSTOMER SUPPORT')
                ->setHtmlBody('<b>Dear Valued Customer,</b>' . '<br><br>' .
                    'Your details has been received! Our customer support will update you soon.')
                ->send();

            if (true) {

                if ($techinquiry->save()) {
                }
                return '<b><br>Details sent! Kindly check your email for further instructions. Thank you!</b>' . '<br><br>';
            }
        }

        $id = Yii::$app->request->post('id');

        $technologies = Technologies::find()->where(['id' => $id])->one();

        if ($technologies == null) {
            throw new NotFoundHttpException('No item found', 404);
        }
        $tech_category = Tech_category::find()->where(['id' => $technologies['category_id']])->one();

        return $this->render(
            'technology-details',
            [
                'technologies' => $technologies,
                'tech_category' => $tech_category,
                // 'technology' => $technology,
            ]
        );
    }

    public function actionProficiencyDetails()
    {
        $pt_inquiry = new Pt_inquiry();
        $submittedSuccessfully = false;

        if ($pt_inquiry->load(Yii::$app->request->post())) {

            $id = Yii::$app->request->post('id');
            $pt_inquiry->pt_code_id = $id;
            $materials = Pt_materials::find()->where(['id' => $pt_inquiry->pt_code_id])->one();
            $pt_inquiry->date_inquiry = date('Y-m-d H:i:s');


            if ($pt_inquiry->email_address == '') {
            } else {

                $result = Yii::$app->mailer->compose()
                    ->setFrom('customer@itdi.dost.gov.ph')
                    ->setTo(array($pt_inquiry->email_address, 'beingalvinmerano@gmail.com'))
                    ->setSubject('ITDI CUSTOMER SUPPORT')
                    ->setHtmlBody('Good day ' . '<b>' . $pt_inquiry->contact_person . '!</b>' .
                        '<br> We have received your application to join ' . '<b>' . $materials->analyte_matrix . '</b>' .
                        ' proficiency testing. Below are the details of your inquiry:<br>' .
                        '<table>' . '<tbody>' .
                        '<tr>' .
                        '<td><b>PT Code: </b></td>' . '<td>' . $materials->pt_code . '</td>' .
                        '</tr>' .
                        '<tr>' .
                        '<td><b>Analyte(s) and Matrix: </b></td>' . '<td>' . $materials->analyte_matrix . '</td>' .
                        '</tr>' .
                        '<tr>' .
                        '<td><b>Concentration Range: </b></td>' . '<td>' . $materials->concentration_range . '</td>' .
                        '</tr>' .
                        '<tr>' .
                        '<td><b>Fee: </b></td>' . '<td>' . $materials->fee . '</td>' .
                        '</tr>' .
                        '<tr>' .
                        '<td><b>Mode of Payment: </b></td>' . '<td>' . $pt_inquiry->mode_of_payment . '</td>' .
                        '</tr><br>' .
                        'Thank you for inquiring!<br><br>Regards,<br>National Metrology Laboratory' .
                        '</tbody>' . '</table>')
                    ->send();

                // $pt_inquiry->save();
                // return $this->render('submittedSuccessfully');


                if ($pt_inquiry->save()) {
                    return '<b><br>Details sent! Kindly check your email for further instructions. Thank you!</b>' . '<br>';
                }
            }
        }

        $id = Yii::$app->request->post('id');

        $pt_materials = Pt_materials::find()->where(['id' => $id])->one();
        $pt_category = Pt_categories::find()->where(['id' => $pt_materials['target_analytes']])->one();
        // var_dump($pt_materials);die;
        if ($pt_materials == null) {
            throw new NotFoundHttpException('No item found', 404);
        }

        return $this->render('proficiency-details', ['pt_materials' => $pt_materials, 'pt_category' => $pt_category, 'submittedSuccessfully' => $submittedSuccessfully]);
    }


    public function actionLogin()
    {


        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            if (Yii::$app->user->can('access admin module')) {
                return $this->redirect('/itdi-elearning/web/admin');
            }
            if (Yii::$app->user->can('access elearning module')) {
                return $this->redirect('/itdi-elearning/web/backend/training');
            }

            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAvp($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $avp_models = Avp::find()->where(['cat_id' => $id])->all();
            $avp_category = Category::findOne(['id' => $id]);
            return $this->renderAjax('ajax/video', [
                'avp_models' => $avp_models,
                'category' => $avp_category,
            ]);
        }
    }


    //View
    public function actionContact()
    {

        return $this->render('contact');
    }

    public function actionCreateService()
    {
        return $this->redirect(['service/create']);
    }
}
