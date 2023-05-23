<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_to_product".
 *
 * @property int $order_id
 * @property int $product_id
 * @property int $product_variable_id
 * @property int $count
 * @property float $price
 *
 * @property Order $order
 * @property Product $product
 * @property ProductVariables $productVariable
 */
class OrderToProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_to_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'product_variable_id', 'count', 'price'], 'required'],
            [['order_id', 'product_id', 'product_variable_id', 'count'], 'integer'],
            [['price'], 'number'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
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
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'product_variable_id' => 'Product Variable ID',
            'count' => 'Count',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
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
