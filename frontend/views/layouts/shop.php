<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\ShopAssets;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

ShopAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
   <head>
      <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
   </head>
   <!-- body -->
   <body class="main-layout">
    <?php $this->beginBody() ?>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="header_top d_none1">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4">
                        <ul class="conta_icon ">
                           <li><a href="#"><img src="images/call.png" alt="#"/>Call us: 0126 - 922 - 0162</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <div class="se_fonr1">
                           <span class="time_o"> Open hour: 8.00 - 18.00</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                           <li><a href="#"><img src="images/email.png" alt="#"/> post@gmail.com</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="#"><img src="images/shopping.png" alt="#"/></a> </li>
                           <a href="#" class="order">Order Now</a> 
                        </ul>
                     </div>
                  </div>
               </div>
            </div> 
         </div>
</header>
     <?=$content?>
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>INFORMATION </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>MY ACCOUNT </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>ABOUT  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>CONTACTS  </h3>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
   

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();


