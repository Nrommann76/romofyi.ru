<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $type_id
 * @property int|null $manufacturer_id
 * @property int $created_by
 *
 * @property User $createdBy
 * @property Manufacturer $manufacturer
 * @property OrderToProduct[] $orderToProducts
 * @property ProductCharacteristic[] $productCharacteristics
 * @property ProductVariablesGallery[] $productVariablesGalleries
 * @property ProductVariables[] $productVariables
 * @property Type $type
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'type_id', 'created_by'], 'required'],
            [['price'], 'number'],
            [['type_id', 'manufacturer_id', 'created_by'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::class, 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'type_id' => 'Type ID',
            'manufacturer_id' => 'Manufacturer ID',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Manufacturer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::class, ['id' => 'manufacturer_id']);
    }

    /**
     * Gets query for [[OrderToProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderToProducts()
    {
        return $this->hasMany(OrderToProduct::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductCharacteristics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristic::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductVariablesGalleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductVariablesGalleries()
    {
        return $this->hasMany(ProductVariablesGallery::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }

    public function getProductVariables()
    {
        return $this->hasMany(ProductVariables::class, ['product_id' => 'id']);
    }
}
