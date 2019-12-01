<?php

namespace common\models\base;

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
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['summary', 'content'], 'string'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['slug', 'keywords', 'description'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '服务 ID',
            'name' => '名称',
            'slug' => '识别字串',
            'keywords' => 'SEO 关键字',
            'description' => 'SEO 描述',
            'summary' => '简介',
            'content' => '内容',
            'status' => '状态',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service}}';
    }
}
