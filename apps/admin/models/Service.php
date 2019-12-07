<?php

namespace admin\models;

use ijony\helpers\Image;
use Yii;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property string $id 服务 ID
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property string $keywords SEO 关键字
 * @property string $description SEO 描述
 * @property string $summary 简介
 * @property string $content 内容
 * @property int $status 状态
 */
class Service extends \common\models\Service
{

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        $datas = Image::recoverImg($this->description);
        $this->description = $datas['content'];

        return parent::beforeSave($insert);
    }
}
