<?php

namespace home\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property string $id 服务 ID
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property string $keywords SEO 关键字
 * @property string $description SEO 描述
 * @property string $content 内容
 * @property int $status 状态
 */
class Service extends \common\models\Service
{

    /**
     * @param bool $onlyParams
     *
     * @return bool|string
     */
    public function getViewUrl($onlyParams = false)
    {
        $params = ['service/view', 'id' => $this->id];

        if ($this->slug) {
            $params = ['service/view', 'slug' => $this->slug];
        }

        if ($onlyParams) {
            return $params;
        }

        return Url::to($params);
    }

    /**
     * @return string
     */
    public function showSummery()
    {
        return nl2br($this->summary);
    }

    /**
     * @param $slug
     *
     * @return \home\models\Service|\yii\db\ActiveRecord|null
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
