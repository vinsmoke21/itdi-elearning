
  <style>
  #more {display: none;}
  #more1{display: none;}
  #more2{display: none;}
  </style>

<section id="services" class="services">
  <div class="container" data-aos="fade-up">
    <header class="section-header" style="margin-top: -40px;">
    <p>Technical Services</p>
    </header>

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" style="text-align: center;">
          <div class="service-box blue">
            <i class="glyphicon glyphicon-home icon" style="text-align: center;"></i>
            <h3  style="cursor:pointer" onclick="window.open('https://request.itdi.com.ph/', '_blank');">FACILITIES</h3>
            <p>Facilities on a scaled up level for various technologies or processes are also available to industry such as those on:
            <span id="dots">...</span>
            <span id="more">
            coconut oil milling and refining, food processing line (canning & dehydration), and materials processing (ceramics, plastics).
            </span>
            </p>
            <span onclick="one()" id="myBtn" class="read-more" style="cursor:pointer">Read more</span>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-box orange">
            <i class="glyphicon glyphicon-file icon"></i>
            <h3  style="cursor:pointer" onclick="window.open('https://request.itdi.com.ph/', '_blank');">CONTRACT R&D</h3>
            <p>Applied research in the fields of industrial manufacturing, mineral processing, energy and environment, using local
            <span id="dot">...</span>
            <span id="more1">
            raw materials.
            </span>
            </p>
            <span onclick="two()" id="myBtn1" class="read-more" style="cursor:pointer">Read more</span>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-box green">
            <i class="glyphicon glyphicon-user icon"></i>
            <h3  style="cursor:pointer" onclick="window.open('https://request.itdi.com.ph/', '_blank');">CONSULTANCY</h3>
            <p>Open to the public especially for college students, researchers and entrepreneurs. A worthy source of in-depth
            <span id="dots2">...</span>
            <span id="more2">
            information on the Institute's major areas of concern and allied subjects; a special collection of theses and technical reports of in-house researches/studies.
            </span>
            </p>
            <span onclick="three()" id="myBtn2" class="read-more" style="cursor:pointer">Read more</span>
          </div>
        </div>
      </div>
    </div>
</section><!-- End Services Section -->

<script>
function one() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

function two() {
  var dot = document.getElementById("dot");
  var more1Text = document.getElementById("more1");
  var btn1Text = document.getElementById("myBtn1");

  if (dot.style.display === "none") {
    dot.style.display = "inline";
    btn1Text.innerHTML = "Read more"; 
    more1Text.style.display = "none";
  } else {
    dot.style.display = "none";
    btn1Text.innerHTML = "Read less"; 
    more1Text.style.display = "inline";
  }
}

function three() {
  var dots2 = document.getElementById("dots2");
  var more2Text = document.getElementById("more2");
  var btn2Text = document.getElementById("myBtn2");

  if (dots2.style.display === "none") {
    dots2.style.display = "inline";
    btn2Text.innerHTML = "Read more"; 
    more2Text.style.display = "none";
  } else {
    dots2.style.display = "none";
    btn2Text.innerHTML = "Read less"; 
    more2Text.style.display = "inline";
  }
}
</script>

