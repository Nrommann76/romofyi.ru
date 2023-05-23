<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_variables_gallery".
 *
 * @property int|null $product_id
 * @property int|null $product_variable_id
 * @property int|null $gallery_id
 *
 * @property Gallery $gallery
 * @property Product $product
 * @property ProductVariables $productVariable
 */
class ProductVariablesGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_variables_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_variable_id', 'gallery_id'], 'integer'],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::class, 'targetAttribute' => ['gallery_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['product_variable_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductVariables::class, 'targetAttribute' => ['product_variable_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_variable_id' => 'Product Variable ID',
            'gallery_id' => 'Gallery ID',
        ];
    }

    /**
     * Gets query for [[Gallery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::class, ['id' => 'gallery_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[ProductVariable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductVariable()
    {
        return $this->hasOne(ProductVariables::class, ['id' => 'product_variable_id']);
    }
}
