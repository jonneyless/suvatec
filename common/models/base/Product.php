<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $id 产品 ID
 * @property string $category_id 分类 ID
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property string $preview 主图
 * @property string $keywords SEO 关键字
 * @property string $description SEO 描述
 * @property string $specification 规格
 * @property string $intro 介绍
 * @property int $status 状态
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['specification', 'intro'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['slug', 'preview', 'keywords', 'description'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '产品 ID',
            'category_id' => '分类 ID',
            'name' => '名称',
            'slug' => '识别字串',
            'preview' => '主图',
            'keywords' => 'SEO 关键字',
            'description' => 'SEO 描述',
            'specification' => '规格',
            'intro' => '介绍',
            'status' => '状态',
        ];
    }
}
