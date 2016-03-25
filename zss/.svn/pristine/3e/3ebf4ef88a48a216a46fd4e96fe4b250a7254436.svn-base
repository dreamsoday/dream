<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zss_auth_node".
 *
 * @property integer $node_id
 * @property string $node_name
 * @property string $node_title
 * @property string $node_remark
 * @property integer $node_status
 * @property integer $node_pid
 * @property integer $node_level
 */
class AuthNode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zss_auth_node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_status', 'node_pid', 'node_level'], 'integer'],
            [['node_name'], 'string', 'max' => 20],
            [['node_title'], 'string', 'max' => 50],
            [['node_remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'node_id' => 'Node ID',
            'node_name' => 'Node Name',
            'node_title' => 'Node Title',
            'node_remark' => 'Node Remark',
            'node_status' => 'Node Status',
            'node_pid' => 'Node Pid',
            'node_level' => 'Node Level',
        ];
    }
}
