<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zss_banner".
 *
 * @property integer $banner_id
 * @property string $banner_title
 * @property string $banner_desc
 * @property string $banner_thumb
 * @property string $banner_url
 * @property integer $group_id
 */
class ZssBanner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id'], 'integer'],
            [['banner_title', 'banner_thumb', 'banner_url'], 'string', 'max' => 30],
            [['banner_desc'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'banner_id' => 'Banner ID',
            'banner_title' => 'Banner Title',
            'banner_desc' => 'Banner Desc',
            'banner_thumb' => 'Banner Thumb',
            'banner_url' => 'Banner Url',
            'group_id' => 'Group ID',
        ];
    }
}
