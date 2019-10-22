<?php

namespace common\models;

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
 * @property int $is_star 推荐
 * @property int $status 状态
 *
 * @property \common\models\ProductGallery[] $gallery
 * @property \common\models\Category $category
 */
class Product extends namespace\base\Product
{

    const STATUS_DELETE = 0;    // 删除
    const STATUS_UNACTIVE = 1;  // 禁用
    const STATUS_ACTIVE = 9;    // 启用

    const IS_STAR_NO = 0;
    const IS_STAR_YES = 9;

    /**
     * 商品组图
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasMany(ProductGallery::className(), ['product_id' => 'id'])->orderBy(['sort' => SORT_ASC]);
    }

    /**
     * 商品分类信息
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
