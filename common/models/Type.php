<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Characteristics[] $characteristics
 * @property Product[] $products
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 32],
            ['name', 'unique']
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
        ];
    }

    /**
     * Gets query for [[Characteristics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasMany(Characteristics::class, ['type_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['type_id' => 'id']);
    }
}
