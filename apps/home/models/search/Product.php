<?php

namespace home\models\search;

use home\models\Category;
use home\models\Product as ProductModel;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class Product
 *
 * @property $category_id
 * @property $category_slug
 *
 * @package home\models
 */
class Product extends Model
{

    public $category_id;
    public $category_slug;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'category_slug'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductModel::find()->where(['status' => ProductModel::STATUS_ACTIVE]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
            'sort' => [
                'defaultOrder' => [
                    'category_id' => SORT_ASC,
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load(['Product' => $params]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        if (!$this->category_id && $this->category_slug) {
            $this->category_id = Category::getOneBySlug($this->category_slug)->id;
        }

        if ($this->category_id) {
            $query->andFilterWhere(['category_id' => $this->category_id]);
        }

        return $dataProvider;
    }
}
