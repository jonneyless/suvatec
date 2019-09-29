<?php

namespace home\models;

use Yii;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property string $id 页面 ID
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property string $keywords SEO 关键字
 * @property string $description SEO 描述
 * @property string $content 内容
 * @property int $status 状态
 */
class Page extends \common\models\Page
{

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
     * @param $id
     *
     * @return string
     */
    public static function getSlugById($id)
    {
        $model = self::findOne($id);

        return $model ? $model->slug : '';
    }

    /**
     * @param $id
     *
     * @return string
     */
    public static function getContentById($id, $noHtml = false)
    {
        $model = self::findOne($id);

        return $model ? strip_tags($model->content, '<p><br>') : '';
    }
}
