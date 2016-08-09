<?php

namespace app\controllers;

use Yii;
use app\models\Address;
use app\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Address models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Address model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Address model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate( $orgId )
    {
        $model = new Address();
        $model->organizationId = $orgId;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
         //   return $this->redirect(['view', 'id' => $model->id]);
         return $this->redirect(['/organization/view', 'id' => $orgId]);
        } 
         elseif (Yii::$app->request->isAjax) 
        
        {
            return $this->renderAjax('_form', [
                        'model' => $model
            ]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      //  if ( $orgId !== null )
       //     return $this->redirect(['/organization/view', 'id' => $orgId ]);
    }

    /**
     * Updates an existing Address model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
    //    $orgId = $model->organizationId;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    //    if ( $orgId !== null )
     //       return $this->redirect(['/organization/view', 'id' => $orgId ]);
    }

    /**
     * Deletes an existing Address model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $orgId = $model->organizationId;
        $personId = $model->personId;
        $model->delete();

        if ( $orgId !== null )
            return $this->redirect(['/organization/view', 'id' => $orgId ]);
        else if ( $personId !== null )
            return $this->redirect([ '/person/view', 'id' => $personId ]);
       // return $this->redirect(['index']);
    }

    /**
     * Finds the Address model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetstreet2(){
 
        if(!Yii::app()->request->isAjaxRequest)
        thrownewCHttpException(404);
        
        $street1= (int)$_POST['street1'];
        $data=array(1=>array(1=>'广州','深圳','东莞','佛山'), 2=>array(1=>'桂林','南宁','玉林'));
        
        if(isset($data[$street1])){
        foreach($data[$street1]as$value=>$name){
        echoCHtml::tag('option',array('value'=>$value), CHtml::encode($name), true);
        }
        }else{
        echoCHtml::tag('option',array('value'=>''),'street2', true);
        }
        }
}
