<?php

namespace common\models;

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
 *
 * @property \common\models\Category $parent
 */
class Category extends namespace\base\Category
{

    const STATUS_UNACTIVE = 0;    // 禁用
    const STATUS_ACTIVE = 9;      // 启用

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
}
