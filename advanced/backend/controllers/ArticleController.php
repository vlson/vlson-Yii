<?php

namespace backend\controllers;

use Yii;
use common\models\Article;
use backend\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $post = Yii::$app->request->post();

        if (Yii::$app->request->isPost && !empty($post)) {
            $url = Yii::$app->urlManager->createAbsoluteUrl(['article/index']);
            $model->load($post);
            if($post['Editorw1-html-code']){
                $model->content_html = $post['Editorw1-html-code'];
            }

            if(!$model->validate()){
                echo "<script>alert('填写字段信息错误!');window.location.href='$url';</script>";
                die;
            }
            if($model->save()){
                return $this->redirect(['index']);
            }
            echo "<script>alert('添加数据失败!');window.location.href='$url';</script>";die;
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();

        if (Yii::$app->request->isPost && !empty($post)) {
            $model->load($post);
            if($post['Editorw1-html-code']){
                $model->content_html = $post['Editorw1-html-code'];
            }

            if($model->save()){
                return $this->redirect(['index']);
            }

            $url = Yii::$app->urlManager->createAbsoluteUrl(['article/index']);
            echo "<script>alert('添加数据失败!');window.location.href='$url';</script>";die;
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(!$model){
            echo "<script>alert('删除失败，文章不存在！');window.location.href='/article';</script>";
        }

        $model->status = 0;
        if($model->save()){
            return $this->redirect(['index']);
        }else{
            echo "<script>alert('删除失败，请重新操作');window.location.href='/admin';</script>";
        }
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
