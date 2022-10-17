<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use mdm\admin\models\form\Signup;

class ApiController extends ActiveController
{

  public $modelClass = 'app\models\OrderOfPayment';
  public $modelClass1 = 'app\models\PaymentDetails';

  public $modelClass2 = 'app\models\customer\Customer';

  public function behaviors()
  {
      return [
          [
              'class' => 'yii\filters\ContentNegotiator',
              'only' => ['view', 'index'],
              'formats' => [
                  'application/json' => Response::FORMAT_JSON,
              ],
          ],
          [
              'class' => \yii\filters\Cors::className(),
              'cors' => [
              'Origin' => ['*'],
                  'Access-Control-Request-Method' => ['GET', 'POST'],
                  'Access-Control-Request-Headers' => ['*'],
                  'Access-Control-Allow-Credentials' => true,
                  'Access-Control-Max-Age' => 86400,
              ]    
          ],
      ];
  }

  public function actionOp()
  {
      $model = new $this->modelClass;

      if(isset($_GET['id'])) {
          $data = $model::find()->where(["op_id" => $_GET['id']])->all();
      } else if ($model->load(Yii::$app->request->post(), '')) {

          $req_id = 0;

          // req_data retrieves the posted json data
          $req_data = Yii::$app->request->post();

          // start transaction
          $Connection = Yii::$app->epayment_db;
          $Transaction = $Connection->beginTransaction();

          if(isset($req_data['transaction_num']) && isset($req_data['customer_code']) && isset($req_data['collection_type']) && isset($req_data['collection_code']) && isset($req_data['order_date']) && isset($req_data['agency_code']) && isset($req_data['total_amount']) && isset($req_data['email']) && isset($req_data['payment_details'])){

              $c_code = $req_data['customer_code'];
              $email = $req_data['email'];

              // payment_details gets the payment details from posted the json data
              $payment_details = $req_data['payment_details'];
              //$payment_details = [];

              if(filter_var("".$email, FILTER_VALIDATE_EMAIL)) {
                  // Valid email address
                  // Save in the tbl_order_of_payment
                  $model->transaction_num = $req_data['transaction_num'];
                  $model->customer_code = $c_code;
                  $model->collection_type = $req_data['collection_type'];
                  $model->collection_code = $req_data['collection_code'];
                  $model->order_date = $req_data['order_date'];
                  $model->agency_code = $req_data['agency_code'];
                  $model->total_amount = $req_data['total_amount'];
                  $model->op_status = 'Pending';

                  $success = $model->save();

                  // Get the op_id of the stored order of payment data
                  $req_id = $model->op_id;

                  $successItem = false;

                  if($success){
                      // Loop (if there is) and save the payment details 
                      for($i = 0; $i < count($payment_details); $i++) {

                          $model1 = new $this->modelClass1;

                          // Save in the tbl_payment_details
                          $model1->op_id = $req_id;
                          $model1->request_ref_num = $payment_details[$i]['request_ref_num'];
                          $model1->rrn_date_time = $payment_details[$i]['rrn_date_time'];
                          $model1->amount = $payment_details[$i]['amount'].'';

                          if($model1->validate()) {
                              $successItem = $model1->save();
                              unset($model1);
                          } else {
                              $successItem = false;
                          }
                      }

                      //if($payment_details == []){
                      //$successItem = true;
                      //}

                      // Check
                      if($successItem) {

                          $Transaction->commit();
                          $transCode = $req_data['transaction_num'];

                          // If the data stored successfully
                          $data = [
                              'status'=>'success',
                              'description'=>'OP is successfuly posted.',
                              'payment_details'=>$payment_details
                          ];

                          $customer_account_exists = Yii::$app->user_db->createCommand('SELECT * FROM user where cust_code = :code')->bindValue(':code', $c_code)->queryAll();

                          $to = "".$email;
                          $subject = "DOST OneLab ePayment (Ref#:".$transCode.")";

                          $message = "
                              <html>
                                  <head>
                                      <title>OneLab ePayment</title>
                                      <style>
                                      div.card { margin: auto; width: 60%; border: 1px solid #D3D3D3; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); text-align: center; }
                                      div.header { background-color: #00adf1; color: white; text-align: left; padding: 20px; font-size: 15px; }
                                      div.container { padding: 10px; }
                                      .button { background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: auto; cursor: pointer; -webkit-transition-duration: 0.4s; transition-duration: 0.4s; }
                                      .button2:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19); }
                                      </style>
                                  </head>
                                  <body>
                                      <div style='text-align: center; padding-top: 20px'>
                                          <h2>OneLab</h2>
                                          <p>One Laboratory. Worldwide.</p>
                                          <div class='card'> ";
                                              if(!isset($customer_account_exists) || $customer_account_exists == '' || $customer_account_exists == null) {

                                                  function randomPassword($length) { 
                                                      mt_srand((double)microtime() * 1000000); 
                                                      $possible = 'abcdefghijklmnopqrstuvwxyz' . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
                                                      $randompass =""; 
                                                      while(strlen($randompass) < $length) { 
                                                          $randompass .= substr($possible, mt_rand(0, strlen($possible) -1), 1); 
                                                      } 
                                                      return ($randompass); 
                                                  }
                                                  $model2 = new Signup();

                                                  $uname = split("@", $email);

                                                  $model2->username = $uname;
                                                  //$model2->username = randomPassword(8);
                                                  $model2->password = randomPassword(8);
                                                  $model2->email = ''.$email;
                                                  $model2->cust_code = $c_code;

                                                  $model2->signup();

                                                  $generatedUsername = $model2->username;
                                                  $generatedPassword = $model2->password;

                                                  $message .= "
                                                  <div class='header'>
                                                  <p>Dear valued customer,</p>
                                                  <p>Your transaction is now ready for ePayment in the OneLab Customer Portal. Please use the following account details to login:</p>
                                                  <br/>
                                                  <table style='color: white;'>
                                                  <tr><td><b>Username:</b></td><td>".$generatedUsername."</td></tr>
                                                  <tr><td><b>Password:</b></td><td>".$generatedPassword."</td></tr>
                                                  </table>
                                                  <br/>
                                                  <a href='https://customer.onelab.ph' target='_blank' class='button button2'>Click here to login</a>
                                                  <br/><br/>
                                                  <p>When you are logged in, please change your account details with your preferred username and password.<br/> 
                                                  <br/>Thank you!</p>
                                                  </div>
                                                  ";
                                              } else {
                                                  /*$model2 = new Signup();

                                                  $uname = split("@", $email);

                                                  $model2->username = $uname;
                                                  $generatedUsername = $model2->username;*/
                                                 // ".$generatedUsername."
                                                  $message .= "
                                                  <div class='header'>
                                                      <h5>Hi !</h5>
                                                      <p>Your transaction is now ready for ePayment in the OneLab Customer Portal. Please use your previous account details to login.</p>
                                                      <br/>
                                                      <a href='https://customer.onelab.ph' target='_blank' class='button button2'>Click here to login</a>
                                                      <br/><br/>
                                                      <p>If you forgot your account details, click <a href=''>here</a>.<br/> 
                                                      <br/>Thank you!</p>
                                                  </div>";
                                              }
                                              //  or (+632) 837-2071 loc. 2188 / 2189 / 2198
                                              $message .= "
                                              <div class='container'>
                                                  <p>If you experience any issues while logging in or with your password, please don't hesitate to contact us at:</p>
                                                  <p>support@onelab.ph</p>
                                              </div>
                                          </div>
                                          <div style='margin: auto; width: 60%; padding-top: 20px;'>
                                              <p style='font-size: 9px; opacity: 0.7;'>DISCLAIMER:  This email and any attachments are intended only for the 
                                              individual or company to which it is addressed and may contain information which is privileged, confidential and 
                                              prohibited from disclosure or unauthorized use under applicable law.  If you are not the intended recipient of 
                                              this email, you are hereby notified that any use, dissemination, or copying of the email or the information 
                                              contained in the email is strictly prohibited by the sender.  If you have received this transmission in error, 
                                              please return the material received to the sender and delete all copies from the system.
                                              </p>
                                          </div>
                                      </div>
                                  </body>
                              </html>";

                          // Always set content-type when sending HTML email
                          $headers = "MIME-Version: 1.0" . "\r\n";
                          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                          // More headers
                          $headers .= 'From: <support@onelab.ph>';

                          mail($to,$subject,$message,$headers);
                      } else {

                          $Transaction->rollback();

                          // If there is an error saving the data
                          $errors = $model1->errors;
                          $data=[
                              'status'=>'error',
                              'description'=>'Failed to save details, Please check the data.',
                              'payment_details'=>$req_id,
                              'errors' => $errors
                          ];

                      }
                  } else {
                      //Error saving OP
                      $Transaction->rollback();
                      $errors = $model->errors;
                      $data=[
                          'status'=>'error',
                          'description'=>'OP is already posted.'
                      ];
                  }
              } else {
                  // invalid email address
                  $data=[
                      'status'=>'error',
                      'description'=>'Invalid email address.'
                  ];
              }
          } else {
              $data=[
                  'status'=>'error',
                  'description'=>'Please check your data.'
              ];
          }
      } else {
          $data=[
              'status'=>'error',
              'description'=>'Please check your data.'
          ];
      }

      Yii::$app->response->format= \yii\web\Response::FORMAT_JSON;
      return $data;

  }
  public function actionProfile()
  {
      $model = new $this->modelClass2;
      
      if (isset($_GET['auth']) && $_GET['auth'] == '8c51a546d2fa36afe8d1edd80d1ae40b75032ca013356fc867af55f90f5fdd79') {
        
        if (isset($_GET['name']) || isset($_GET['code'])) {
          //if ($_GET['code'] !== '') {
            //$data = $model::find()->where(['customer_code'=>$_GET['code']])->asArray()->all();

		    $query = $model::find()
          ->joinWith(['customertype'])->with(['industrytype'])
          ->with(['region'])->with(['province'])->with(['city']);


        $dataProvider = new ActiveDataProvider([
              'query' => $query,
        ]);
		
        if (isset($_GET['name'])) {
          $query->andFilterWhere(['like', 'customer_name', $_GET['name']]);
        }
        if (isset($_GET['code'])) {
          $query->where(['customer_code' => $_GET['code']]);
        }

        	$query->orderBy(['customer_name' => SORT_ASC]);
		      $query->asArray()->all();

        	$data = $dataProvider;
          //}
          //else {
            //$data=[
              //'status'=>'error',
              //'description'=>'No data.'
            //];
          //}
        }
        else {
          //$data = $model::find()->where(['<>','customer_code',''])->asArray()->all();
          //$data = array("0" => $dataArr);

		      $query = $model::find()
            ->joinWith(['customertype'])->with(['industrytype'])
            ->with(['region'])->with(['province'])->with(['city']);


        	$dataProvider = new ActiveDataProvider([
            'query' => $query,
        	]);

        	$query->orderBy(['customer_name' => SORT_ASC]);
		      $query->asArray()->all();

        	$data = $dataProvider;
        }
        
      }
      else {
        $data=[
          'status'=>'error',
          'description'=>'No data.'
        ];
      }

      Yii::$app->response->format= \yii\web\Response::FORMAT_JSON;      
      return $data;
  }
  public function actionSaveProfile()
  {
      $model = new $this->modelClass2;
      
      if (isset($_GET['auth']) && $_GET['auth'] == '8c51a546d2fa36afe8d1edd80d1ae40b75032ca013356fc867af55f90f5fdd79') {
        if ($model->load(Yii::$app->request->post(), '')) {
          $req_data = Yii::$app->request->post();
          
          $cust = $model::find()->where(['customer_code' => $req_data['customer_code']])->one();
          
          if (count($cust) == 0) {
          
            $model->customer_code = $req_data['customer_code'];
            $model->customer_type_id = $req_data['customer_type_id'];
            $model->industry_type_id = $req_data['industry_type_id'];
            $model->customer_name = $req_data['customer_name'];
            $model->location = $req_data['location'];
            $model->city_id = $req_data['city_id'];
            $model->province_id = $req_data['province_id'];
            $model->region_id = $req_data['region_id'];
            $model->contact = $req_data['contact'];
            $model->email = $req_data['email'];
            $model->fax = $req_data['fax'];
            $model->date_registered = $req_data['date_registered'];
            $model->cenDB = 1;

            if ($model->save()) {
              $data=[
                'status'=>'success',
                'description'=>$req_data
              ];
            }
            else {
              $data=[
                'status'=>'error',
                'description'=>$model->errors
              ];
            }
          }
          else {
            $data=[
              'status'=>'success',
              'description'=>'Customer Info is already added.'
            ];
          }
          
          Yii::$app->response->format= \yii\web\Response::FORMAT_JSON;
          
          return $data;
        }
      }
  }
  public function actionConnected()
  {
    $connected = @fsockopen("customer.onelab.ph", 80); 
                                        
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    Yii::$app->response->format= \yii\web\Response::FORMAT_JSON;
    return $is_conn;

  }
}