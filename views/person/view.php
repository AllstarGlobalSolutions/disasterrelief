<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\PhoneSearch;
use app\models\AddressSearch;
use app\models\EmailSearch;
use app\models\PersonSearch;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'People'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstName',
            'lastName',
            'position',
            'organizationId',
        ],
    ]) ?>

    <div class="row">
        <div class="col-md-6">
            <?php
                $dataProvider = new yii\data\ActiveDataProvider( [ 'query' => app\models\Phone::find()->where( [ 'personId' => $model->id ] ) ] );

                ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showHeader' => false,
                    'summary' =>'',
                    'caption' => 'Phones &nbsp;&nbsp;' . Html::button('Add', ['value' => Url::to(['phone/create', 'psnId' => $model->id ]), 'title' => 'Add Phone', 'class' => 'showModalButton btn btn-sm btn btn-success']),
                    'columns' => [
                
                        'type',
                        'countryCode',
                        'number',

                        ['class' => 'yii\grid\ActionColumn',
                        'buttons'=>[
                            'delete' => function($url,$model,$key ){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['phone/delete','id' => $model->id ]), ['data-method'=>'post']);
                            }
                        ]],
                    ],
                ]); ?>
        </div>
        <div class="col-md-6">
            <?php
                $dataProvider = new yii\data\ActiveDataProvider( [ 'query' => app\models\Email::find()->where( [ 'personId' => $model->id ] ) ] );
                ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showHeader' => false,
                    'summary' => '',
                    'caption' =>'Email &nbsp;&nbsp;' . Html::button('Add', ['value' => Url::to(['email/create', 'psnId' => $model->id ]), 'title' => 'Add Email Address', 'class' => 'showModalButton btn btn-sm btn btn-success']),
                    'columns' => [
                'id',
                        'type',
                        'address',

                        ['class' => 'yii\grid\ActionColumn',
                        'buttons'=>[
                            'delete' => function($url,$model,$key ){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['email/delete','id' => $model->id ]), ['data-method'=>'post']);
                            }
                        ]],
                    ],
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
                $dataProvider = new yii\data\ActiveDataProvider( [ 'query' => app\models\Address::find()->where( [ 'personId' => $model->id ] ) ] );
            ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showHeader' => false,
                    'summary' => 'Address &nbsp;&nbsp;' .  Html::button('Add', ['value' => Url::to(['address/create', 'psnId' => $model->id ]), 'title' => 'Add Address', 'class' => 'showModalButton btn btn-sm btn btn-success']),
                    'columns' => [
                
                        'type',
                        'street1',
                        'city',
                        'stateOrProvince',
                        'zipcode',
                        'country',

                        ['class' => 'yii\grid\ActionColumn',
                        'buttons'=>[
                            'delete' => function($url,$model,$key ){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['address/delete','id' => $model->id ]), ['data-method'=>'post']);
                            }
                        ]],
                    ],
                ]); ?>
        </div>        
    </div>
</div>
