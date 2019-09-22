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
 * @property int $status 状态
 */
class Product extends namespace\base\Product
{
}
