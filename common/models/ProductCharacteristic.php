<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_characteristic".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $characteristic_id
 * @property string|null $value
 *
 * @property Characteristics $characteristic
 * @property Product $product
 */
class ProductCharacteristic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_characteristic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'characteristic_id'], 'integer'],
            [['value'], 'string', 'max' => 32],
            [['characteristic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristics::class, 'targetAttribute' => ['characteristic_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
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
            'characteristic_id' => 'Characteristic ID',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Characteristic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristic()
    {
        return $this->hasOne(Characteristics::class, ['id' => 'characteristic_id']);
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
}
