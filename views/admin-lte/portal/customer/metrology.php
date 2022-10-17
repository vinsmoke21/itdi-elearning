<?php

use kartik\dialog\Dialog;
use yii\web\JsExpression;

echo Dialog::widget();
?>

<style>
  .features .feture-tabs .nav-link.active {
    color: #4154f1;
    border-bottom: 3px solid #4154f1;
  }

  .features .feture-tabs .nav-link {
    background: none;
    text-transform: uppercase;
    font-size: 15px;
    font-weight: 600;
    color: #012970;
    padding: 12px 0;
    margin-right: 25px;
    margin-bottom: -2px;
    border-radius: 0;
  }
</style>

<!-- ======= Features Section ======= -->
<section id="calibrationandmeasurement" class="features">
  <div class="container" data-aos="fade-up">
    <header class="section-header">
      <p>Calibration and Measurement</p>
    </header>

    <!-- Feature Tabs -->
    <div class="row feture-tabs" data-aos="fade-up" style="margin-top: 30px;">
      <div class="col-lg-6">
        <img src="../img/portfolio/metrology.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6" style="margin-top: -25px;">
        <h3 style="font-size: 24px;">Calibration Services</h3>

        <!-- Tabs -->
        <ul class="nav nav-pills mb-2" style="font-size: 12px">
          <li class="active show">
            <a class="nav-link1" data-toggle="tab" href="#tab1">Electrical</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab2">Length</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab3">Mass</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab4">Pressure and Force</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab5">Volume and Flow</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab6">Thermometry and Hygrometry</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab7">Metrology in Biology</a>
          </li>
          <li>
            <a class="nav-link1" data-toggle="tab" href="#tab8">Metrology in Chemistry</a>
          </li>
        </ul><!-- End Tabs -->

        <!-- Tab Content -->
        <div class="tab-content test">
          <div class="tab-pane active" id="tab1">
            <figure class="test">
              <div class="d-flex align-items-center mb-2">
                <i class="bi bi-check2"></i>
                <h4 style="font-size: 15px;">Electrical Calibration</h4>
              </div>
              <p style="font-size: small; padding-top:5px">The Electrical Standards Section maintains the following Basic Electrical Quantities:
                Voltage, Current, Resistance and Time/Frequency.</p>
            </figure>
          </div>
          <div class="tab-pane" id="tab2">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab2">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Length Calibration</h4>
                    </div>
                    <p style="font-size: small; padding-top:5px">The Length Standards Section of the National Metrology Laboratory of the Philippines
                      (NML) is capable of calibrating rectangular gauge blocks ranging from 0.5 mm to 100 mm.
                      The laboratory adopted the ISO 3650:1998 second edition as reference procedure for the determination of gauge block length by mechanical comparison using Grade K reference gauge blocks at an ambient temperature of (20 ± 0.5) ˚C.
                    </p>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
          <div class="tab-pane" id="tab3">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab2">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Mass Calibration</h4>
                    </div>
                    <p style="font-size: small; padding-top:5px">
                      The Mass Standards Section of the National Metrology Laboratory is the country’s provider of traceability to the international prototype kilogram. It is also the premier authority in the verification, calibration and performance testing of weights, mass standards, and weighing instruments. It has been granted the ISO/IEC 17025 Accreditation by the Deutsche Akkreditierungsstelle GmbH (German Accreditation Body) on 19 October 2010. Aside from providing traceability, the MSS also offers other metrological services such as training, proficiency testing, measurement audit and consultancy.
                    </p>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
          <div class="tab-pane" id="tab4">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab4">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Pressure and Force Calibration</h4>
                    </div>
                    <p style="font-size: small; padding-top:5px">Pressure and Force Standards Section conducts calibration/testing of the following Instruments:</p>
                    <div class="d-flex align-items-center mb-2">
                      <h5 style="font-size: 15px;"><strong>Pressure</strong></h5>
                    </div>
                    <p style="font-size: small; padding-top:5px">Pressure Calibrator / Module, Digital Pressure Gauge, Test Gauge, Pressure Transmitter / Transducer,
                      Industrial Pressure Gauge, Industrial Pressure Balance / Deadweight Tester, Sphygmomanometer</p>
                    <div class="d-flex align-items-center mb-2">
                      <h5 style="font-size: 15px;"><strong>Force</strong></h5>
                      <p style="font-size: small; padding-top:5px">Testing Machines such as universal testing machine, tensile testing machine, compression testing machine, etc.
                        force gauge, dynamometer, push-pull scale, axle weighing system (static mode only); Durometer (Type A & B only),
                        torque meter, torque wrenches, spring torque testers, torque drivers</p>
                    </div>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
          <div class="tab-pane" id="tab5">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab5">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Flow and Volume Calibration</h4>
                    </div>
                    <p style="font-size: small; padding-top:5px">
                      The Volume and Flow Standards Section of the National Metrology Laboratory,
                      ITDI-DOST primarily provides calibration and performance testing of Road tankers,
                      Flowmeters and Volumetric Instruments such as Test Measures, Provers, Piston-Operated
                      Volumetric Apparatus and Laboratory Glasswares ranging from 20 microliters to 2000 Liters.
                      Proficiency testing and trainings on calibration of volumetric instruments are also conducted by the group of experts consisting the Section’s work force.
                    </p>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
          <div class="tab-pane" id="tab6">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab6">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Thermometry and Hygrometry Calibration</h4>
                    </div>
                    <p style="font-size: small; padding-top:5px">
                      Standards and Equipment The Thermometry (LIGT, DT, and IPRT) Standards Section of NML maintains two
                      reference standard SPRTs (Standard Platinum Resistance Thermometer) that are traceable to SI through KRISS,
                      Korea. These SPRTs are used to calibrate two working standard IPRTs (Industrial Platinum Resistance Thermometer) to provide traceability to SI to measurements done in the country. SPRTs may also be used as reference standard for the calibration of thermometers from customers depending on the uncertainty requirement.
                    </p>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
          <div class="tab-pane" id="tab7">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab7">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Metrology in Biology Calibration</h4>
                    </div>
                    <p>
                      ---
                    </p>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
          <div class="tab-pane" id="tab8">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab8">
                  <figure>
                    <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4 style="font-size: 15px;">Metrology in Chemistry Calibration</h4>
                    </div>

                    <p>
                    <div class="panel panel-success" style="background-color: #1B1464;">
                      <div class="panel-heading" style="background-color: tranparent;">
                        <center><b>List of Available Matrix CRMs</b>
                          <p>(as of December 2021)</p>
                        </center>
                      </div>

                      <div class="table-responsive">
                        <table class="kv-grid-table table  table-striped kv-table-wrap">

                          <thead class="table-bordered" style="color: #fff;">
                            <tr>
                              <th class="table-bordered" style="text-align:center">PRM Code and <br>Description</th>
                              <th class="table-bordered" style="text-align:center">Certified Value</th>
                              <th class="table-bordered" style="text-align:center">Unit Quantity</th>
                              <th class="table-bordered" style="text-align:center">Price</th>
                            </tr>
                            <tr style="background-color:#a4b0be">
                              <th></th>
                              <th style="text-align: center; color:black">Water Matrix</th>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>


                          <tbody>

                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0401<br>Pb, Cd, Fe and Cu in<br>Drinking Water</td>
                              <td class="table-bordered">Pb: 10.5 ± 2.0 μg/kg<br>Cd: 2.86 ± 0.30 μg/kg<br>Fe: 932 ± 51 μg/kg<br>Cu: 579 ± 27 μg/kg</td>
                              <td class="table-bordered">1 x 120 ml</td>
                              <td class="table-bordered">₱ 7,500</td>
                            </tr>

                          </tbody>
                          <tbody>

                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0901<br>Ca, Mg and Zn Cu in<br>Drinking Water</td>
                              <td class="table-bordered">Ca: 312 ± 24 mg/kg<br>Mg: 175 ± 6.9 mg/kg<br>Zn: 12.9 ± 1.3 mg/kg</td>
                              <td class="table-bordered">1 x 120 ml</td>
                              <td class="table-bordered">₱ 11,000</td>
                            </tr>

                          </tbody>
                          <tr style="background-color: #a4b0be">
                            <th></th>
                            <th style="text-align: center; color:black">Food Matrix</th>
                            <th></th>
                            <th></th>
                          </tr>
                          <tbody>
                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0101<br>Benzoic Acid in Mango<br>Juice</td>
                              <td class="table-bordered">Benzoic acid: 1059 ± 50 mg/kg</td>
                              <td class="table-bordered">1 x 30 g</td>
                              <td class="table-bordered">₱ 7,200</td>
                            </tr>
                          </tbody>
                          <tbody>
                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0201<br>Histamine in Canned<br>Tuna</td>
                              <td class="table-bordered">Histamine: 61.5 ± 5.0 mg/kg</td>
                              <td class="table-bordered">1 x 25 g</td>
                              <td class="table-bordered">₱ 11,000</td>
                            </tr>
                          </tbody>
                          <tbody>
                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0202<br>Histamine in Dried Fish</td>
                              <td class="table-bordered">Histamine: 230 ± 14.0 mg/kg</td>
                              <td class="table-bordered">1 x 30 g</td>
                              <td class="table-bordered">₱ 11,000</td>
                            </tr>
                          </tbody>
                          <tbody>
                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0501 Sulfite in<br>Dried Mango</td>
                              <td class="table-bordered">Sulfite as SO2: 931 ± 94 mg/kg</td>
                              <td class="table-bordered">1 x 200 g</td>
                              <td class="table-bordered">₱ 6,500</td>
                            </tr>
                          </tbody>
                          <tbody>
                            <tr style="text-align: center;">
                              <td class="table-bordered">PRM 0601 Salbutamol<br>in Meat</td>
                              <td class="table-bordered">Salbutamol: 227.1 ± 14.0 mg/kg</td>
                              <td class="table-bordered">1 x 20 g</td>
                              <td class="table-bordered">₱16,000</td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="6" style="color: white;">
                                <p style="font-size: 10px; text-align:right">*Courier fee not included</p>
                                <p style="font-size: 12px; text-align:left">For quotation and inquiries, send us an email at <span class="om" style="cursor:pointer" onclick="window.open('https://www.google.com/', '_blank');">mic@itdi.dost.gov.ph / nml.micpt@gmail.com</span></p>
                              </th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    </p>
                  </figure>
                </div>
              </div>
            </figure>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <a href="<?= Yii::$app->request->baseUrl ?>/service/create" class="btn2 effect02">
              <span>Request a Quote</span>
            </a>
          </div>
        </div>
        <!-- <div class="row"> -->
        <h3 style="font-size: 24px;">PT Services</h3>
        <div class="row">
          <div class="col-sm-6">
            <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
              <a class="btn1 effect01" style="cursor:pointer" onclick="window.open('http://localhost/cportal/itdi-elearning/web/reference-materials/index/','_blank');"><span>Proficiency Testing</span></a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
              <a class="btn1 effect01" style="cursor:pointer" onclick="window.open('http://localhost/cportal/itdi-elearning/web/reference-materials/index/','_blank');"><span>Reference Materials</span></a>
            </div>
          </div>
        </div>



      </div>

    </div><!-- End Feature Tabs -->

  </div>

</section>


<style>
  .nav>li>a {
    color: #4d4643;
    transition: all 0.3s;
    list-style: none;
    font-family: "Dosis", sans-serif;


  }

  .nav>li:hover>a {
    color: #fff;
    transition: all 0.3s;
    list-style: none;
    font-family: "Dosis", sans-serif;
    background-color: #3c8dbc;

  }
</style>

<?php
$js = <<< JS
  $("#btn-confirm").on("click", function() {
      krajeeDialog.confirm("Are you sure you want to proceed?", function (result) {
          if (result) {
              alert('Great! You accepted!');
          } else {
              alert('Oops! You declined!');
          }
      });
  });
  JS;

$this->registerJs($js);
?>