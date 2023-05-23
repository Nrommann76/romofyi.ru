<?php

namespace backend\controllers;

use common\models\Type;
use yii\web\Controller;

class TypeController extends Controller
{
    public function actionCreate()
    {
        $model = new Type();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $this->redirect('/product/create');
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete()
    {

    }

    public function actionEdit()
    {
        
    }

    public function actionIndex()
    {

    }
}