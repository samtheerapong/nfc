<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\nfc\models\Department $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="department-view">
    <div style="display: flex; justify-content: space-between;">
        <p>
            <?= Html::a('<i class="fas fa-chevron-left"></i> ' . Yii::t('app', 'Go Back'), ['index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <p style="text-align: right;">
            <?= Html::a('<i class="fas fa-edit"></i> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

            <?= Html::a('<i class="fas fa-trash"></i> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-body table-responsive">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th style="width: 200px;">{label}</th><td> {value}</td></tr>',
                'attributes' => [
                    // 'id',
                    [
                        'attribute' => 'code',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->code ? $model->code : Yii::t('app', '');
                        },
                    ],

                    [
                        'attribute' => 'name',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->name ? $model->name : Yii::t('app', '');
                        },
                    ],

                  
                    [
                        'attribute' => 'color',
                        'format' => 'html',
                        'value' => function ($model) {
                            return
                                '<span class="badge" style="background-color:' . $model->color . '; color: #FFFFFF;">' . $model->color . '</span>';
                        },
                    ],
                    
                    [
                        'attribute' => 'active',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->active === 1 ? '<span class="text" style="color:#1A5D1A">Yes</span>' : '<span class="text" style="color:#FE0000">No</span>';
                        },
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>