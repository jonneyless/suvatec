<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property string $id 页面 ID
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property string $keywords SEO 关键字
 * @property string $description SEO 描述
 * @property string $summary 简介
 * @property string $content 内容
 * @property int $status 状态
 */
class Page extends \common\models\Page
{
}
