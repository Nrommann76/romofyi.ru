<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_variables".
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_variable_id
 * @property string $color_hex
 * @property int $allowance
 *
 * @property OrderToProduct[] $orderToProducts
 * @property ProductVariablesGallery[] $productVariablesGalleries
 */
class ProductVariables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_variables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_variable_id', 'color_hex', 'allowance'], 'required'],
            [['product_id', 'product_variable_id', 'allowance'], 'integer'],
            [['color_hex'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_variable_id' => 'Product Variable ID',
            'color_hex' => 'Color Hex',
            'allowance' => 'Allowance',
        ];
    }

    /**
     * Gets query for [[OrderToProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderToProducts()
    {
        return $this->hasMany(OrderToProduct::class, ['product_variable_id' => 'id']);
    }

    /**
     * Gets query for [[ProductVariablesGalleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductVariablesGalleries()
    {
        return $this->hasMany(ProductVariablesGallery::class, ['product_variable_id' => 'id']);
    }
}
