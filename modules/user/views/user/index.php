<?php

use app\modules\user\models\User;
use app\modules\user\models\UserDepartment;
use app\modules\user\models\UserPermission;
use app\modules\user\models\UserRole;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap5\LinkPager;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\user\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div style="display: flex; justify-content: space-between;">
        <div class="mb-3">
            <?= Html::a('<i class="fa fa-plus"></i> ' . Yii::t('app', 'Create New User'), ['create'], ['class' => 'btn btn-danger']) ?>
        </div>

        <div class="mb-3" style="text-align: right;">
            <?= Html::a('<span class="fa fa-refresh"></span> ', ['index'], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>


    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Yii::t('app', 'Showing {count} users', ['count' => $dataProvider->totalCount]) ?>
        </div>
        <div class="card-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pager' => [
                    'class' => LinkPager::class,
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['style' => 'width: 45px;'],],

                    // 'id',
                    // 'username',
                    // 'thai_name',
                    [
                        'attribute' => 'thai_name',
                        'format' => 'html',
                        'headerOptions' => ['style' => 'width:250px;'],
                        'value' => function ($model) {
                            return $model->thai_name ? $model->thai_name : 'N/A';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'thai_name',
                            'data' => ArrayHelper::map(User::find()->all(), 'id', 'thai_name'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    // 'auth_key',
                    // 'password_hash',
                    //'password_reset_token',
                    'email:email',
                    // 'created_at:date',
                    //'updated_at',
                    //'verification_token',
                    // 'status',
                    [
                        'attribute' => 'department_id',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:120px;'],
                        'value' => function ($model) {
                            return $model->department_id ? '<span class="text" style="color:' . $model->departments->color . ';">' . $model->departments->code . '</span>' : 'N/A';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'department_id',
                            'data' => ArrayHelper::map(UserDepartment::find()->where(['active' => 1])->all(), 'id', 'code'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],
                    [
                        'attribute' => 'role',
                        'format' => 'html',
                        'headerOptions' => ['class' => 'text-center', 'style' => 'width:180px;'],
                        'value' => function ($model) {
                            return $model->role ?  $model->roles->code  : 'N/A';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'role',
                            'data' => ArrayHelper::map(UserRole::find()->where(['active' => 1])->all(), 'id', 'code'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'permission',
                        'format' => 'html',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width:150px;'],
                        'value' => function ($model) {
                            return $model->permission ? '<span class="text" style="color:' . $model->permissions->color . ';">' . $model->permissions->code . '</span>' : 'N/A';
                        },
                        'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'permission',
                            'data' => ArrayHelper::map(UserPermission::find()->where(['active' => 1])->all(), 'id', 'code'),
                            'options' => ['placeholder' => Yii::t('app', 'Select...')],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])
                    ],

                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'contentOptions' => function ($model) {
                            $color = $model->status === User::STATUS_ACTIVE ? 'green' : 'red';
                            return ['style' => "width:150px; color: $color;"];
                        },
                        'value' => function ($model) {
                            return $model->status === User::STATUS_ACTIVE ? Yii::t('app', 'Active') : Yii::t('app', 'Inactive');
                        },
                        'filter' => [
                            User::STATUS_ACTIVE => Yii::t('app', 'Active'),
                            User::STATUS_INACTIVE => Yii::t('app', 'Inactive'),
                        ],
                    ],


                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width: 150px;'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                        'template' => '<div class="btn-group btn-group-sm" role="group"> {view} {update} {delete}</div>',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>