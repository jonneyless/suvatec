<?php

namespace admin\models;

use ijony\helpers\File;
use ijony\helpers\Image;
use common\libs\Utils;
use Yii;
use yii\helpers\ArrayHelper;

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
 * @property string $intro 介绍
 * @property int $is_star 推荐
 * @property int $status 状态
 *
 * @property array $galleries 组图数据
 */
class Product extends \common\models\Product
{

    public $galleries = [
        'image' => [],
        'thumb' => [],
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['galleries'], 'safe'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (!$this->slug) {
            $this->slug = Utils::genSlug($this->name);
        }

        $datas = Image::recoverImg($this->specification);
        $this->specification = $datas['content'];

        $datas = Image::recoverImg($this->intro);
        $this->intro = $datas['content'];

        if ($this->preview && substr($this->preview, 0, 6) == BUFFER_FOLDER) {
            $oldImg = $this->preview;
            $newImg = Image::copyImg($this->preview);

            if ($newImg) {
                File::delFile($oldImg, true);
            }

            $this->preview = $newImg;
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if (isset($changedAttributes['preview']) && $changedAttributes['preview']) {
            File::delFile($changedAttributes['preview'], true);
        }

        if ($this->gallery) {
            foreach ($this->gallery as $gallery) {
                if (!in_array($gallery->image, $this->galleries['image'])) {
                    $gallery->delete();
                }
            }
        }

        ProductGallery::deleteAll(['product_id' => $this->id]);

        if ($this->galleries['image']) {
            foreach ($this->galleries['image'] as $index => $gallery) {
                (new ProductGallery([
                    'product_id' => $this->id,
                    'image' => $gallery,
                    'sort' => $index,
                ]))->save();
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function afterDelete()
    {
        parent::afterDelete();

        $galleries = ProductGallery::findAll(['product_id' => $this->id]);
        foreach ($galleries as $gallery) {
            $gallery->delete();
        }

        File::delFile($this->preview, true);
    }

    public function fillRelations()
    {
        if ($this->gallery) {
            foreach ($this->gallery as $gallery) {
                $this->galleries['image'][] = $gallery->image;
                $this->galleries['thumb'][] = Image::getImg($gallery->image, 170, 170);
            }
        }
    }

    /**
     * 分类下拉表单数据
     * @return array
     */
    public function getCategorySelectData()
    {
        return Category::find()->select('name')->where(['status' => Category::STATUS_ACTIVE])->indexBy('category_id')->column();
    }

    /**
     * 获取主图
     *
     * @param int $width
     * @param int $height
     *
     * @return mixed
     */
    public function getPreview($width = 0, $height = 0)
    {
        return Image::getImg($this->preview, $width, $height);
    }

    /**
     * 输出所属分类名称
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category ? $this->category->name : '';
    }

    /**
     * 获取状态表述
     *
     * @return mixed|string
     */
    public function getStatus()
    {
        $datas = $this->getStatusSelectData();

        return isset($datas[$this->status]) ? $datas[$this->status] : '';
    }

    /**
     * 获取状态标签
     *
     * @return mixed|string
     */
    public function getStatusLabel()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            $class = 'label-primary';
        } else {
            $class = 'label-danger';
        }

        return Utils::label($this->getStatus(), $class);
    }

    /**
     * 获取完整状态数据
     *
     * @return array
     */
    public function getStatusSelectData()
    {
        return [
            self::STATUS_UNACTIVE => '禁用',
            self::STATUS_ACTIVE => '启用',
        ];
    }

    /**
     * 获取状态表述
     *
     * @return mixed|string
     */
    public function getIsStar()
    {
        $datas = $this->getIsStarSelectData();

        return isset($datas[$this->is_star]) ? $datas[$this->is_star] : '';
    }

    /**
     * 获取状态标签
     *
     * @return mixed|string
     */
    public function getIsStarLabel()
    {
        if ($this->is_star == self::IS_STAR_YES) {
            $class = 'label-primary';
        } else {
            $class = 'label-default';
        }

        return Utils::label($this->getIsStar(), $class);
    }

    /**
     * 获取完整状态数据
     *
     * @return array
     */
    public function getIsStarSelectData()
    {
        return [
            self::IS_STAR_NO => '普通',
            self::IS_STAR_YES => '推荐',
        ];
    }
}
