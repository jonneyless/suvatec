<?php

namespace home\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $id 分类 ID
 * @property string $parent_id 父级分类
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property int $child 是否有子级
 * @property string $parent_arr 父级链
 * @property string $child_arr 子级群
 * @property string $sort 排序
 * @property int $status 状态
 */
class Category extends \common\models\Category
{

    /**
     * @param int $parent_id
     *
     * @return \home\models\Category[]|\yii\db\ActiveRecord[]
     */
    public static function getCatogriesByParentId($parent_id = 0)
    {
        return self::find()->where(['parent_id' => $parent_id])->all();
    }

    /**
     * @param $slug
     *
     * @return \home\models\Category|\yii\db\ActiveRecord|null
     */
    public static function getOneBySlug($slug)
    {
        return self::find()->where(['slug' => $slug])->one();
    }
}
