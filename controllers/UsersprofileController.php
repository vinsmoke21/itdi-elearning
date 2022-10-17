<?php


namespace app\controllers;

use app\models\backend\Seminars;
use app\models\customer\Usersprofile;
use app\models\customer\Region;
use app\models\customer\Email;
use app\models\customer\Municipality;
use app\models\customer\Province;
use app\models\customer\UsersprofileSearch;
use app\models\backend\Trainings;
use app\models\backend\Webinar_inquiry;
use app\models\customer\ChecklistData;
use app\models\customer\ChecklistTraining;
use app\models\customer\TrainingBackground;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\SampleType;
use app\models\customer\WebinarCustomer;
use Exception;
use yii\web\Response;

/**
 * ParticipantsInformationController implements the CRUD actions for ParticipantsInformation model.
 */
class UsersprofileController extends Controller
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
     * Lists all ParticipantsInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersprofileSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => Usersprofile::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
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




    /**
     * Displays a single ParticipantsInformation model.
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
     * Creates a new ParticipantsInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tn)
    {

        $inquiry = Webinar_inquiry::findOne(['session_id' => $tn]);

        $inquiry2 = WebinarCustomer::findOne(['session_id' => $tn]);


        if (!$inquiry) {
            return $this->redirect(['error']);
        }

        $seminar = Seminars::find()->where(['id' => $inquiry->seminar_id])->one();


        $model = new Usersprofile();
        $region = Region::find()->all();
        $province = Province::find()->all();
        $municipality = Municipality::find()->all();
        $background = TrainingBackground::find()->all();
        $checklist = new ChecklistData();
        $submittedSuccessfully = false;

        $checklistT = ChecklistTraining::find()->where(['training_id' => $model['training_id']])->all();
        $checklistS = ChecklistTraining::find()->where(['seminar_id' => $model['seminar_id']])->all();


        $model->training_id = $inquiry->training_id;
        $model->seminar_id = $inquiry->seminar_id;


        if ($model->training_id != null) {
            
            $checklistT = ChecklistTraining::find()->where(['training_id' => $model['training_id']])->all();
            $model->title_of_training = $inquiry->training_title;
            $model->webinar_id = $inquiry->id;
            $model->transaction_id = $inquiry2->transaction_code;
            $link = Trainings::find()->where(['id' => $model['training_id']])->one();
            $model->payment = $link->payment;
        } else {
            $checklistS = ChecklistTraining::find()->where(['seminar_id' => $model['seminar_id']])->all();
            $model->transaction_id = $inquiry2->transaction_code;
            $model->webinar_id = $inquiry->id;
            $model->title_of_seminar = $seminar->title;
            $linkS = Seminars::find()->where(['id' => $model['seminar_id']])->one();
            $model->payment = $linkS->payment;
        }

        $map = 'https://www.google.com/maps/dir//F3Q2%2BV7P+Industrial+Technology+Development+Institute,+General+Santos+Ave,+Taguig,+Metro+Manila/@14.4875454,121.0449656,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3397cf13f2815617:0x62cd153863a634cc!2m2!1d121.050695!2d14.48971';
        $dost = 'https://itdi.dost.gov.ph/images/TransparencySeal/ITDI-DOST_MAP_a.jpg';

        if ($model->training_id != null) {
            if ($checklistT != null) {

                if ($model->load(Yii::$app->request->post()) && $checklist->load(Yii::$app->request->post())) {
                    if ($model->save()) {

                        $list = $checklist->training_background_id;
                        if ($list != NULL) {

                            foreach ($list as $i => $lists) {
                                $check = new ChecklistData();
                                $check->training_background_id = (int)$lists;
                                $check->userprofile_id = $model->id;
                                $check->save();
                            }
                        }
                    }

                    $submittedSuccessfully = true;

                    if ($link->mode == 2) {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'We thank you for your interest in our training program.' . '<br>' .
                                'Here are the address of DOST-ITDI.' . '<br><br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map . '<br><br>' .
                                'DOST Map: ' . $dost . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                        ')
                            ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    } else {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'Thank you for your interest in our training program.' .
                                ' Here are the zoom link to enter in our training.' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                            ')
                            ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    }
                }
            } else {

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $submittedSuccessfully = true;
                    if ($link->mode != 2) {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'We thank you for your interest in our training program.' . '<br>' .
                                'Here are the address of DOST-ITDI.' . '<br><br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map . '<br><br>' .
                                'DOST Map: ' . $dost . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                        ')
                            ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    } else {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'Thank you for your interest in our training program.' .
                                ' Here are the zoom link to enter in our training.' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                            ')
                            ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    }
                }
            }
        } else {
            // var_dump('seminar');die;
            if ($checklistS != null) {
                var_dump($checklistS);die;

                if ($model->load(Yii::$app->request->post()) && $checklist->load(Yii::$app->request->post())) {
                    if ($model->save()) {

                        $list = $checklist->training_background_id;
                        if ($list != NULL) {

                            foreach ($list as $i => $lists) {
                                $check = new ChecklistData();
                                $check->training_background_id = (int)$lists;
                                $check->userprofile_id = $model->id;
                                $check->save();
                            }
                        }
                    }

                    $submittedSuccessfully = true;


                    if ($link->mode == 2) {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'We thank you for your interest in our training program.' . '<br>' .
                                'Here are the address of DOST-ITDI.' . '<br><br>' .
                                'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                                '<br>' .
                                'Google Map: ' . $map . '<br><br>' .
                                'DOST Map: ' . $dost . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                        ')
                            ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    } else {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'Thank you for your interest in our training program.' .
                                ' Here are the zoom link to enter in our training.' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                            ')
                            ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    }
                }
            } else {

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $submittedSuccessfully = true;
                    if ($link->mode == 2) {
                        $result = Yii::$app->mailer->compose()
                        ->setFrom('customer@itdi.com.ph')
                        ->setTo($model->email)
                        ->setSubject('ITDI CUSTOMER SUPPORT')
                        ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                            'We thank you for your interest in our training program.' . '<br>' .
                            'Here are the address of DOST-ITDI.' . '<br><br>' .
                            'Address:' . 'Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila' .
                            '<br>' .
                            'Google Map: ' . $map . '<br><br>' .
                            'DOST Map: ' . $dost . '<br><br>' .
                            'Thank you for registering<br>Regards,<br>ITDI' . '
                    ')
                        ->send();

                        if (true) {


                            $model->save();
                            $model = new Usersprofile();
                        }
                    } else {
                        $result = Yii::$app->mailer->compose()
                            ->setFrom('customer@itdi.com.ph')
                            ->setTo($model->email)
                            ->setSubject('ITDI CUSTOMER SUPPORT')
                            ->setHtmlBody('<b>' . 'Dear ' . $model->firstname . ',' . '</b>' . '<br><br>' .
                                'Thank you for your interest in our training program.' .
                                ' Here are the zoom link to enter in our training.' . $link['zoom_link'] . '<br><br>' .
                                'Thank you for registering<br>Regards,<br>ITDI' . '
                            ')
                            ->send();

                        if (true) {
                            $model->save();
                            $model = new Usersprofile();
                        }
                    }
                }
            }
        }

        $slotsAvailable = $inquiry->nop - $inquiry->getAvailableSlots();

        $totalSlot = $inquiry->nop;

        if ($slotsAvailable <= 0) {
            $slotsAvailable = 0;
            return $this->redirect(['usersprofile/register/' . $tn]);
        }



        return $this->render('create', [
            'model' => $model,
            'region' => $region,
            'province' => $province,
            'municipality' => $municipality,
            'submittedSuccessfully' => $submittedSuccessfully,
            'inquiry' => $inquiry,
            // 'inquiry2' => $inquiry2,
            'slotsAvailable' => $slotsAvailable,
            'totalSlot' => $totalSlot,
            'background' => $background,
            'checklist' => $checklist,
            'checklistT' => $checklistT,
            'checklistS' => $checklistS,

        ]);
    }

    /**
     * Creates a new ParticipantsInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegister($tn)
    {
        $inquiry = Webinar_inquiry::findOne(['session_id' => $tn]);
        $model = WebinarCustomer::findOne(['session_id' => $tn]);
        if (!$inquiry) {
            return $this->redirect(['error']);
        }

        $seminarID = $inquiry->seminar;
        $training = $inquiry->trainings;


        $submittedSuccessfully = false;

        if (!$inquiry) {
            throw new \Exception('404 not found');
        }

        if ($model->training_id != null) {
            $model->training_id = $training->id;
        } else {
            $model->seminar_id = $seminarID->id;
        }


        if ($model->load(Yii::$app->request->post())) {


            if ($inquiry->password == $model->password_id) {
                return $this->redirect(['usersprofile/create/' . $tn]);
            } else {
                $submittedSuccessfully = true;
            }
        }

        $slotsAvailable = $inquiry->nop - $inquiry->getAvailableSlots();
        $totalSlot = $inquiry->nop;

        if ($slotsAvailable <= 0) {
            $slotsAvailable = 0;
        }

        return $this->render('register', [
            'model' => $model,
            'inquiry' => $inquiry,
            'training' => $training,
            'seminarID' => $seminarID,
            'submittedSuccessfully' => $submittedSuccessfully,
            'slotsAvailable' => $slotsAvailable,
            'totalSlot' => $totalSlot,
        ]);
    }


    /**
     * Updates an existing ParticipantsInformation model.
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
     * Deletes an existing ParticipantsInformation model.
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
     * Finds the ParticipantsInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ParticipantsInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usersprofile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
