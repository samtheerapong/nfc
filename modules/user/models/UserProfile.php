<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $emp_code
 * @property string|null $thai_name
 * @property string|null $eng_name
 * @property string|null $nick_name
 * @property string|null $birthday
 * @property int|null $department
 * @property int|null $posision
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'department', 'posision'], 'integer'],
            [['birthday'], 'safe'],
            [['emp_code', 'nick_name'], 'string', 'max' => 45],
            [['thai_name', 'eng_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'emp_code' => Yii::t('app', 'Emp Code'),
            'thai_name' => Yii::t('app', 'Thai Name'),
            'eng_name' => Yii::t('app', 'Eng Name'),
            'nick_name' => Yii::t('app', 'Nick Name'),
            'birthday' => Yii::t('app', 'Birthday'),
            'department' => Yii::t('app', 'Department'),
            'posision' => Yii::t('app', 'Posision'),
        ];
    }
}
