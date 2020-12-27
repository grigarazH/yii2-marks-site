<?php

namespace backend\controllers;

use Yii;
use common\models\TeacherSubject;
use common\models\TeacherSubjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeacherSubjectController implements the CRUD actions for TeacherSubject model.
 */
class TeacherSubjectController extends Controller
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
     * Lists all TeacherSubject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherSubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TeacherSubject model.
     * @param integer $teacher_id
     * @param integer $subject_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($teacher_id, $subject_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($teacher_id, $subject_id),
        ]);
    }

    /**
     * Creates a new TeacherSubject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TeacherSubject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'teacher_id' => $model->teacher_id, 'subject_id' => $model->subject_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TeacherSubject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $teacher_id
     * @param integer $subject_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($teacher_id, $subject_id)
    {
        $model = $this->findModel($teacher_id, $subject_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'teacher_id' => $model->teacher_id, 'subject_id' => $model->subject_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TeacherSubject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $teacher_id
     * @param integer $subject_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($teacher_id, $subject_id)
    {
        $this->findModel($teacher_id, $subject_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TeacherSubject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $teacher_id
     * @param integer $subject_id
     * @return TeacherSubject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($teacher_id, $subject_id)
    {
        if (($model = TeacherSubject::findOne(['teacher_id' => $teacher_id, 'subject_id' => $subject_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
