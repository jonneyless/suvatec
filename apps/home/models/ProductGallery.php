<?php

namespace home\models;

use ijony\helpers\Image;
use Yii;

/**
 * This is the model class for table "{{%product_gallery}}".
 *
 * @property string $product_id 产品 ID
 * @property string $image 图片
 * @property int $sort 排序
 */
class ProductGallery extends \common\models\ProductGallery
{

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
        return Image::getImg($this->image, $width, $height);
    }
}
