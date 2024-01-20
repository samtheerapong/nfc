<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $emp_code
 * @property string|null $thai_name
 * @property string|null $eng_name
 * @property string|null $nick_name
 * @property string|null $birthday
 * @property int|null $department
 * @property int|null $posision
 * @property int|null $permission
 * @property int|null $rule
 *
 * @property User[] $users
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['department', 'posision', 'permission', 'rule'], 'integer'],
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
            'emp_code' => Yii::t('app', 'Emp Code'),
            'thai_name' => Yii::t('app', 'Thai Name'),
            'eng_name' => Yii::t('app', 'Eng Name'),
            'nick_name' => Yii::t('app', 'Nick Name'),
            'birthday' => Yii::t('app', 'Birthday'),
            'department' => Yii::t('app', 'Department'),
            'posision' => Yii::t('app', 'Posision'),
            'permission' => Yii::t('app', 'Permission'),
            'rule' => Yii::t('app', 'Rule'),
        ];
    }

   
    // public function getUsers()
    // {
    //     return $this->hasMany(User::class, ['profile_id' => 'id']);
    // }
}
