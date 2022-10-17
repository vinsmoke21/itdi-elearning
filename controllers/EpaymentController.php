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
class EpaymentController extends Controller
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

        return $this->render('index', [
        ]);
    }

    // public function actionPtMaterials()
    // {

    //     return $this->render('pt-materials', [
    //     ]);
    // }
}