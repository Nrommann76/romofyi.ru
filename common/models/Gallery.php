<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $src
 *
 * @property ProductVariablesGallery[] $productVariablesGalleries
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src'], 'required'],
            [['src'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
        ];
    }

    /**
     * Gets query for [[ProductVariablesGalleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductVariablesGalleries()
    {
        return $this->hasMany(ProductVariablesGallery::class, ['gallery_id' => 'id']);
    }
}
