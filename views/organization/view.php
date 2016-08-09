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
/* @var $model app\models\Organization */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="organization-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-6">
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
                    'name',
                    'type',
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?php
                $searchModel = new EmailSearch();
                $dataProvider = $searchModel->search( [ 'oranizationId' => $model->id] );
                ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'showHeader' => false,
                // 'showFooter' => true,

                    'summary' => '',
                    'caption' =>'Email &nbsp;&nbsp;' . Html::button('Add', ['value' => Url::to(['email/create', 'orgId' => $model->id ]), 'title' => 'Add Email Address', 'class' => 'showModalButton btn btn-sm btn btn-success']),
                    'columns' => [
                
                    //  'id',
                        'type',
                        'address',
                        'organizationId',
                    //  'personId',

                        ['class' => 'yii\grid\ActionColumn',

                        'visibleButtons' => [

                            'view' => false
                        ],
                        'buttons'=>[

                            'update' => function($url, $model, $key ) {

                                return Html::a( '<span class="glyphicon glyphicon-edit"></span>', Url::to(['email/update','id' => $model->id ]) );
                            },
                            'delete' => function($url,$model,$key ){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['email/delete','id' => $model->id ]), ['data-method'=>'post']);

                            }
                        ]],

                    ],
                ]); ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?php
            $searchModel = new PhoneSearch();
            $dataProvider = $searchModel->search( [ 'oranizationId' => $model->id] ); ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'showHeader' => false,
                //    'showFooter' => true,
                // 'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;'],
                    'summary' =>'',
                    'caption' => 'Phones &nbsp;&nbsp;' . Html::button('Add', ['value' => Url::to(['phone/create', 'orgId' => $model->id ]), 'title' => 'Add Phone', 'class' => 'showModalButton btn btn-sm btn btn-success']),
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
            $searchModel = new PersonSearch();
            $dataProvider = $searchModel->search( [ 'oranizationId' => $model->id] );   ?>
            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'showHeader' => false,
                //  'showFooter' => true,
                    'summary' =>'Person &nbsp;&nbsp;' .  Html::button('Add', ['value' => Url::to(['person/create', 'orgId' => $model->id ]), 'title' => 'Add Person', 'class' => 'showModalButton btn btn-sm btn btn-success']),
                    'columns' => [
                
                    //    'id',
                        'firstName',
                        'lastName',
                        'position',
                    //   'organizationId',

                        ['class' => 'yii\grid\ActionColumn',
                        'buttons'=>[
                            'delete' => function($url,$model,$key ){
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['person/delete','id' => $model->id ]), ['data-method'=>'post']);

                            }
                        ]],

                    ],
                ]); ?>
            </div>
        </div>  

    <div class="row">
        <div class="col-md-12">
            <?php
            $searchModel = new AddressSearch();
            $dataProvider = $searchModel->search( [ 'oranizationId' => $model->id] );
            ?>
         <?//= Html::button('Add Address', ['value' => Url::to(['address/create', 'orgId' => $model->id ]), 'title' => 'Add Address', 'class' => 'showModalButton btn btn-success']) ?>

            <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'showHeader' => false,
                //  'showFooter' => true,
                    'summary' => 'Address &nbsp;&nbsp;' .  Html::button('Add', ['value' => Url::to(['address/create', 'orgId' => $model->id ]), 'title' => 'Add Address', 'class' => 'showModalButton btn btn-sm btn btn-success']),
                    'columns' => [
                
                    //    'id',
                        'type',
                        'street1',
                    //    'street2',
                        'city',
                        'stateOrProvince',
                        'zipcode',
                        'country',
                    //    'organizationId',
                    //    'personId',

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

