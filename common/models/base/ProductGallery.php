<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%product_gallery}}".
 *
 * @property string $product_id 产品 ID
 * @property string $image 图片
 * @property int $sort 排序
 */
class ProductGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id', 'sort'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => '产品 ID',
            'image' => '图片',
            'sort' => '排序',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_gallery}}';
    }
}
