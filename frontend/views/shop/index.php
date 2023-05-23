<?php
/**
 * @var \common\models\Product[] $products
 */
?>
<section class="banner_main">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="text-bg">
                    <h1> <span class="blodark"> Romofyi </span> <br>Trands 2023</h1>
                    <p>A huge fashion collection for ever </p>
                    <a class="read_more" href="#">Shop now</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ban_img">
                    <figure><img src="<?= \yii\helpers\Url::to('images/ban_img.png')?>" alt="#"/></figure>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="project" class="project">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product_main">

                <?php foreach ($products as $product): ?>
                    <div class="project_box ">
                        <div class="dark_white_bg" >
                            <?php foreach ($product->productVariables as $productVariable):?>
                                    <img  src="/uploads/<?= $productVariable->productVariablesGalleries[0]->gallery->src ?>" alt="#"/>
                            <?php endforeach;?>
                        </div>
                        <h3><?= $product->name ?> <?= $product->price ?></h3>
                        <button name="shoes1"class="add-to-cart">Добавить в карзину</button>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Letest News</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin_top40">
                <div class="row d_flex">
                    <div class="col-md-5">
                        <div class="news_img">
                            <figure><img src="images/news_img1.jpg"></figure>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="news_text">
                            <h3>Specimen book. It has survived not only five</h3>
                            <span> 2023</span>
                            <div class="date_like">
                                <span>Like </span><span class="pad_le">Comment</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 margin_top40">
                <div class="row d_flex">
                    <div class="col-md-5">
                        <div class="news_img">
                            <figure><img src="images/news_img2.jpg"></figure>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="news_text">
                            <h3>Specimen book. It has survived not only five</h3>
                            <span>2023</span>
                            <div class="date_like">
                                <span>Like </span><span class="pad_le">Comment</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 margin_top40">
                <div class="row d_flex">
                    <div class="col-md-5">
                        <div class="news_img">
                            <figure><img src="images/news_img3.jpg"></figure>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="news_text">
                            <h3>Specimen book. It has survived not only five</h3>
                            <span>2023</span>
                            <div class="date_like">
                                <span>Like </span><span class="pad_le">Comment</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end news section -->
<!-- newslatter section -->
<div  class="newslatter">
    <div class="container">
        <div class="row d_flex">
            <div class="col-md-5">
                <h3 class="neslatter">Subscribe To Pewdiepie</h3>
            </div>
            <div class="col-md-7">
                <form class="news_form">
                    <input class="letter_form" placeholder=" Enter your email" type="text" name="Enter your email">
                    <button class="sumbit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end newslatter section -->
<!-- three_box section -->
<div class="three_box">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gift_box">
                    <i><img src="images/icon_mony.png"></i>
                    <span>Money Back</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gift_box">
                    <i><img src="images/icon_gift.png"></i>
                    <span>Special Gift</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gift_box">
                    <i><img src="images/icon_car.png"></i>
                    <span>Free Shipping</span>
                </div>
            </div>
        </div>
    </div>
</div>