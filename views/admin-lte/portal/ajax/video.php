<?php
$counter = 1;
$hasClosed = true;

// echo 'HELLO';
// var_dump($model);
$this->registerCssFile('@web/css/home/style.css');
?>

<div class="line-heading"><b><center><?= $category->category ?></center></b></div>

<?php foreach ($avp_models as $vid) : ?>
  <div class="col-sm-6">
    
        <div class="product-image-wrapper">
          <div class="single-products">
           <p><?= $vid['title'] ?></p>
            <iframe class="portfolio-item" width="100%" <?= $vid['filename'] ?> frameborder="0" autoplay="1"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
            picture-in-picture" allowfullscreen>
            </iframe>
            </div>
        </div>

    
  </div>
<?php endforeach; ?>
