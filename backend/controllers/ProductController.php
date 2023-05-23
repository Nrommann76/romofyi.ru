<?php

namespace backend\controllers;

use common\models\form\ProductForm;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ProductController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', compact('dataProvider'));
    }
    public function actionCreate()
    {
        $model = new ProductForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                die('брат, я сохранил');
            } else {
                print_r($model->getErrors());
                die('ошибочка вышла');
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

}