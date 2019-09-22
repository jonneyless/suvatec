<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%product_overview}}".
 *
 * @property string $product_id 产品 ID
 * @property string $type 区块类型
 * @property string $image 图片
 * @property string $content html
 * @property int $sort 排序
 */
class ProductOverview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_overview}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'type'], 'required'],
            [['product_id', 'sort'], 'integer'],
            [['content'], 'string'],
            [['type'], 'string', 'max' => 60],
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
            'type' => '区块类型',
            'image' => '图片',
            'content' => 'html',
            'sort' => '排序',
        ];
    }
}
