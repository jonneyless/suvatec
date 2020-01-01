<?php

namespace home\models;

use ijony\helpers\Image;
use ijony\helpers\Url;
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
 */
class Product extends \common\models\Product
{

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
     * 获取主图
     *
     * @param int $width
     * @param int $height
     *
     * @return mixed
     */
    public function getPreview($width = 0, $height = 0)
    {
        return Image::getImg($this->preview, $width, $height);
    }

    /**
     * @return string
     */
    public function getViewUrl()
    {
        return Url::to(['product/view', 'slug' => $this->slug]);
    }

    /**
     * @param $slug
     *
     * @return \home\models\Product|\yii\db\ActiveRecord|null
     */
    public static function getOneBySlug($slug)
    {
        return self::find()->where(['slug' => $slug])->one();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getStarProducts()
    {
        return self::find()->where(['is_star' => self::IS_STAR_YES])->limit(3)->orderBy(['id' => SORT_DESC])->all();
    }

    public function getKeywords()
    {
        return $this->keywords;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
