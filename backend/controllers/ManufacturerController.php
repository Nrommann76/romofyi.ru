<?php

namespace backend\controllers;

use common\models\Manufacturer;
use yii\web\Controller;

class ManufacturerController extends Controller
{
    public function actionCreate()
    {
        $model = new Manufacturer();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $this->redirect('/product/create');
        }

        return $this->render('create', ['model' => $model]);
    }
}