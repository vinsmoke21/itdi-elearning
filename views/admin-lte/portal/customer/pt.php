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
<section id="proficiency-testing" class="features">
  <div class="container" data-aos="fade-up">
      <header class="section-header">
      <p>Proficiency Testing</p>
      </header>

       
        <!-- Feature Tabs -->
        <div class="row feture-tabs" data-aos="fade-up" style="margin-top: 30px;">
        <div class="col-md-6">
        <div class="md-macbook-pro md-glare">
        <div class="md-lid">
        <div class="md-camera"></div>
        <div class="md-screen">
            <img id="myImage" src="../img/portfolio/t124.jpg" class="img img-responsive" alt="">
        </div>
        </div>
        <div class="md-base"></div>
        </div>
      
          </div>
          <div class="col-md-6">
            <h3>PT Services</h3>

          <!-- Tabs -->
          <ul class="nav nav-pills mb-2">
              <li class="active show">
                <a class="button nav-link1" data-toggle="tab" href="#tab9" onclick=electrical()>Electrical</a>
              </li>
              <li>
                <a class="button nav-link1" data-toggle="tab" href="#tab10" onclick=length()>Length</a>
              </li>
              <li>
                <a class="nav-link1" data-toggle="tab" href="#tab11" onclick=mass()>Mass</a>
              </li>
              <li>
                <a class="nav-link1" data-toggle="tab" href="#tab12">Pressure and Force</a>
              </li>
              <li>
                <a class="nav-link1" data-toggle="tab" href="#tab13">Volume and Flow</a>
              </li>
              <li>
                <a class="nav-link1" data-toggle="tab" href="#tab14">Thermometry and Hygrometry</a>
              </li>
              <li>
              <a class="nav-link1" data-toggle="tab" href="#tab15">Metrology in Biology</a>
              </li>
              <li>
                <a class="nav-link1" data-toggle="tab" href="#tab16" onclick=chemistry()>Metrology in Chemistry</a>
              </li>
            </ul><!-- End Tabs -->

        <!-- Tab Content -->
          <div class="tab-content">
            <div class="button tab-pane active" id="tab9">
              <figure>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Electrical Calibration</h4>
                  </div>
                  <p>The Electrical Standards Section maintains the following Basic Electrical Quantities:
                  Voltage, Current, Resistance and Time/Frequency.</p>
              </figure>
            </div>
              <div class=" tab-pane " id="tab10">
                <figure>
                  <div class="ml-auto"  data-aos="fade-left" data-aos-delay="100">
                    <div class="tab-pane active" id="tab2">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Length Calibration</h4>
                      <!-- <h1 id="message"> -->
                      </div>
                      
                      <p> The Length Standards Section of the National Metrology Laboratory of the Philippines (NML) is capable of calibrating rectangular gauge blocks ranging from 0.5 mm to 100 mm. The laboratory adopted the ISO 3650:1998 second edition as reference procedure for the determination of gauge block length by mechanical comparison using Grade K reference gauge blocks at an ambient temperature of (20 ± 0.5) ˚C.
                      </p>
                      </figure>
                    </div>
                  </div>
                </figure>
              </div>
              <div class="tab-pane" id="tab11">
                <figure>
                  <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                      <div class="tab-pane active" id="tab2">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Mass Calibration</h4>
                      </div>
                      <p>
                      The Mass Standards Section of the National Metrology Laboratory is the country’s provider of traceability to the international prototype kilogram. It is also the premier authority in the verification, calibration and performance testing of weights, mass standards, and weighing instruments. It has been granted the ISO/IEC 17025 Accreditation by the Deutsche Akkreditierungsstelle GmbH (German Accreditation Body) on 19 October 2010. Aside from providing traceability, the MSS also offers other metrological services such as training, proficiency testing, measurement audit and consultancy. 
                      </p>
                      </figure>
                    </div>
                  </div>
                </figure>
              </div>
              <div class="tab-pane" id="tab12">
                <figure>
                  <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                      <div class="tab-pane active" id="tab4">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Pressure and Force Calibration</h4>
                      </div>
                      <p>Pressure and Force Standards Section conducts calibration/testing of the following Instruments:</p>
                      <div class="d-flex align-items-center mb-2">
                      <h5><strong>Pressure</strong></h5>
                      </div> 
                      <p>Pressure Calibrator / Module, Digital Pressure Gauge, Test Gauge, Pressure Transmitter  / Transducer,
                      Industrial Pressure Gauge, Industrial Pressure Balance / Deadweight Tester, Sphygmomanometer</p> 
                      <div class="d-flex align-items-center mb-2">
                      <h5><strong>Force</strong></h5>
                      <p>Testing Machines such as universal testing machine, tensile testing machine, compression testing machine, etc.
                        force gauge, dynamometer, push-pull scale, axle weighing system (static mode only); Durometer (Type A & B only),
                        torque meter, torque wrenches, spring torque testers, torque drivers</p>
                      </div>    
                      </figure>
                    </div>
                  </div>
                </figure>
              </div>
              <div class="tab-pane" id="tab13">
                <figure>
                  <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                      <div class="tab-pane active" id="tab5">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Flow and Volume Calibration</h4>
                      </div>
                      <p>
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
              <div class="tab-pane" id="tab14">
                <figure>
                  <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                      <div class="tab-pane active" id="tab6">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Thermometry and Hygrometry Calibration</h4>
                      </div>
                      <p>
                      Standards and Equipment The Thermometry (LIGT, DT, and IPRT) Standards Section of NML maintains two 
                      reference standard SPRTs (Standard Platinum Resistance Thermometer) that are traceable to SI through KRISS, 
                      Korea. These SPRTs are used to calibrate two working standard IPRTs (Industrial Platinum Resistance Thermometer) to provide traceability to SI to measurements done in the country. SPRTs may also be used as reference standard for the calibration of thermometers from customers depending on the uncertainty requirement.
                      </p>
                      </figure>
                    </div>
                  </div>
                </figure>
              </div>
              <div class="tab-pane" id="tab15">
                <figure>
                  <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                      <div class="tab-pane active" id="tab7">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Metrology in Biology Calibration</h4>
                      </div>
                      <p>
                      ---
                      </p>
                      </figure>
                    </div>
                  </div>
                </figure>
              </div>
              <div class="tab-pane" id="tab16">
                <figure>
                  <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                      <div class="tab-pane active" id="tab8">
                      <figure>
                      <div class="d-flex align-items-center mb-2">
                      <i class="bi bi-check2"></i>
                      <h4>Metrology in Chemistry Services</h4>
                      </div>
                     
                      <p>
                        The Metrology in Chemistry (MiC) Section National Metrology Laboratory (NML) is tasked to disseminate the metrological
                        traceability of chemical measurements in the country through
                        the provision of reference materials (RMs) and proficiency
                        testing (PT) schemes. RMs for food and water produced by MiC
                        are now available for use as materials for method validation
                        and quality control. Reference values are accuracy-based values
                        obtained using higher order methods. Moreover, MiC caters accuracy-based PT schemes for local laboratories to assets their
                        competency in chemical testing. MiC also offers training on the
                        use of different analytical instruments and provide seminars on the aspects of chemical metrology, method validation, and measurement uncertainty.
                      </p>
                      <div class="col-sm-6">
                        <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
                        <a class="btn1 effect01" style="cursor:pointer" onclick="window.open('http://localhost/cportal/itdi-elearning/web/reference-materials/index/','_blank');"><span>Reference Materials</span></a>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
                        <a class="btn1 effect01" style="cursor:pointer" onclick="window.open('http://localhost/cportal/itdi-elearning/web/pt-services/index/','_blank');"><span>PT Services</span></a>
                         
                        </div>
                      </div>
                        <div class="col-sm-6">
                        <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
                          <a href="http://localhost/cportal/itdi-elearning/web/portal/technologytransfer" class="btn1 effect01"><span>Testing Services</span></a>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
                          <a href="http://localhost/cportal/itdi-elearning/web/portal/technologytransfer" class="btn1 effect01"><span>Trainings</span></a>
                        </div>
                        </div>
                      </div>
                      </div>
                      </div>               
                      </figure>
                    </div>
                  </div>
                </figure>
              </div>
            </div>
            <div class="row">
            <div class="col-lg-4">
                <!-- <a href="<?= Yii::$app->request->baseUrl?>/service/create" class="btn2 effect02">
                  <span>Request a Quote</span> 
                </a> -->
                <!-- <button type="button" id="btn-confirm" class="btn btn-warning">Confirm</button> -->
            </div>
            </div>
          
          </div>
        </div><!-- End Feature Tabs -->
                
  </div>
</section>

<style>
 
  .nav > li > a {
      color: #4d4643;
      transition: all 0.3s;
      list-style: none;
      font-family: "Dosis", sans-serif;

  }

  .nav > li:hover > a {
      color: #fff;
      transition: all 0.3s;
      list-style: none;
      font-family: "Dosis", sans-serif;
      background-color: #3c8dbc

  }



</style>

<script>
  function electrical(){
      document.getElementById('myImage')
      .src="../img/portfolio/t124.jpg";
      document.getElementById('message')
      // .innerHTML="Hii! GeeksforGeeks people";
  }
  
  function length(){
      document.getElementById('myImage')
      .src="../img/portfolio/metrology.jpg";
      // document.getElementById('message')
      // .innerHTML=";
  }
  function chemistry(){
      document.getElementById('myImage')
      .src="../img/portfolio/chemistry.jpg";
      // document.getElementById('message')
      // .innerHTML=";
  }

</script>

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
