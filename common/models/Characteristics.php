<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "characteristics".
 *
 * @property int $id
 * @property int|null $type_id
 * @property string $name
 * @property string $metric
 *
 * @property ProductCharacteristic[] $productCharacteristics
 * @property Type $type
 */
class Characteristics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id'], 'integer'],
            [['name', 'metric'], 'required'],
            [['name', 'metric'], 'string', 'max' => 255],
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
            'type_id' => 'Type ID',
            'name' => 'Name',
            'metric' => 'Metric',
        ];
    }

    /**
     * Gets query for [[ProductCharacteristics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristic::class, ['characteristic_id' => 'id']);
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
}
