<?php

namespace admin\models;

use ijony\helpers\File;
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
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if ($this->image && substr($this->image, 0, 6) == BUFFER_FOLDER) {
            $oldImg = $this->image;
            $newImg = Image::copyImg($this->image);

            if ($newImg) {
                File::delFile($oldImg, true);
            }

            $this->image = $newImg;
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function afterDelete()
    {
        parent::afterDelete();

        File::delFile($this->image, true);
    }

    /**
     * 获取图片
     *
     * @param int $width
     * @param int $height
     *
     * @return mixed
     */
    public function getImage($width = 0, $height = 0)
    {
        return Image::getImg($this->image, $width, $height);
    }
}
