<?php

namespace app\controllers;

use app\models\Register;
use app\models\RegisterSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),

                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'index' => ['POST', 'GET'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Register models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $model = new Register();
        //$searchModel = new RegisterSearch();
        //$dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->tbl_registro_password = Yii::$app->getSecurity()->generatePasswordHash($model->tbl_registro_password);


                if ($model->save()) {

                    return $this->redirect(['site/login']);
                } else {


                    $model->tbl_registro_password = "";
                    return $this->render('index', [
                        // 'searchModel' => $searchModel,
                        //'dataProvider' => $dataProvider,
                        'model' => $model,
                    ]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }


        return $this->render('index', [
            // 'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }




    // $searchModel = new RegisterSearch();
    // $dataProvider = $searchModel->search($this->request->queryParams);

    // 'searchModel' => $searchModel,
    //'dataProvider' => $dataProvider,



    /**
     * Displays a single Register model.
     * @param int $tbl_register_id Tbl Register ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tbl_register_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tbl_register_id),
        ]);
    }

    /**
     * Creates a new Register model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $model = new Register();


        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $auth = \Yii::$app->authManager;
                $authorRole = $auth->getRole('author');
                $auth->assign($authorRole, $model->tbl_register_id);
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Register model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tbl_register_id Tbl Register ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tbl_register_id)
    {
        $model = $this->findModel($tbl_register_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tbl_register_id' => $model->tbl_register_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Register model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tbl_register_id Tbl Register ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tbl_register_id)
    {
        $this->findModel($tbl_register_id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Register model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tbl_register_id Tbl Register ID
     * @return Register the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tbl_register_id)
    {
        if (($model = Register::findOne(['tbl_register_id' => $tbl_register_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }












    
    public function actionRegister()
{
    $model = new Register();

    if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
        // Guarda el usuario en la base de datos
        $model->save();

        // ... redirige o muestra un mensaje de éxito
    }

    return $this->render('register', ['model' => $model]);
}
}
