<?php

namespace common\models\form;

use common\models\Gallery;
use common\models\Manufacturer;
use common\models\Product;
use common\models\ProductCharacteristic;
use common\models\ProductVariables;
use common\models\ProductVariablesGallery;
use common\models\Type;
use common\models\User;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ProductForm extends Model
{
    public $name;
    public $price;
    public $type;
    public $manufacturer;
    public $created_by;
    public $gallery;
    public $productCharacteristic;
    public $productVariables;

    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['name', 'price', 'type', 'manufacturer'], 'required'],
            ['name', 'string', 'max' => 64, 'min' => 10],
//            ['gallery', 'file', 'skipOnEmpty' => false, 'maxFiles' => 5],
            ['price', 'number', 'skipOnEmpty' => false]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'price' => 'Цена',
            'manufacturer' => 'Производитель',
            'productVariables' => 'Варианты продукта',
            'productCharacteristic' => 'Характеристики',
            'type' => 'Категория',
            'gallery' => 'Галлерея',
            'created_by' => 'Создатель',
        ];
    }

    public function save()
    {

        $files = UploadedFile::getInstances($this, 'gallery');
        $photoNames = [];

        foreach ($files as $file) {
            $fileName = Yii::$app->security->generateRandomString() . '.' . $file->getExtension();
            $file->saveAs(Yii::getAlias('@frontend/web/uploads/' . $fileName));
            $photoNames[] = $fileName;
        }

        $galleryIds = [];

        foreach ($photoNames as $photoName) {
            $gallery = new Gallery();
            $gallery->src = $photoName;
            $gallery->save(false);
            $galleryIds[] = $gallery->getPrimaryKey();
        }

        $product = new Product();
        $product->name = $this->name;
        $product->price = $this->price;
        $product->type_id = $this->type;
        $product->manufacturer_id = $this->manufacturer;
        $product->created_by = \Yii::$app->user->identity->getId();
        $product->save();

        $productId = $product->getPrimaryKey();

        $productVariable = new ProductVariables();
        $productVariable->product_variable_id = 1;
        $productVariable->product_id = $product->id;
        $productVariable->color_hex = "D0D040";
        $productVariable->allowance = 0;
        $productVariable->save();

        $productVariableId = $productVariable->getPrimaryKey();

        foreach ($galleryIds as $galleryId) {
            $productVariableGallery = new ProductVariablesGallery();
            $productVariableGallery->product_id = $productId;
            $productVariableGallery->product_variable_id = $productVariableId;
            $productVariableGallery->gallery_id = $galleryId;
            $productVariableGallery->save();
        }

        return true;
    }
}