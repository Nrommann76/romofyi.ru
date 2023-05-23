<?php

namespace frontend\controllers;

use common\models\Product;
use yii\web\Controller;

class ShopController extends Controller
{
    public function actionIndex()
    {
        $products = Product::find()->all();
        return $this->render('index', compact('products'));
    }
}