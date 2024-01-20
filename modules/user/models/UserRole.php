<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $color
 * @property int|null $active
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['code', 'name', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'color' => Yii::t('app', 'Color'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
