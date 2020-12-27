<?php
    namespace frontend\controllers;
    use Yii;
    use yii\web\Controller;
    use common\models\SubjectHistory;
    use common\models\MarkHistory;


    
    class SubjectHistoryController extends Controller {
        public function beforeAction($action) {
            $this->enableCsrfValidation = false;
            return parent::beforeAction($action);
        }
        public function actionIndex(){
            $model = SubjectHistory::find();
            return $this->render("index",["model" => $model]);
        }
        public function actionAdd(){
            $model = new SubjectHistory();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render("add",["model" => $model]);
        }
        public function actionView($id){
            $model = $this->findModel($id);
            return $this->render("view",["model" => $model]);
        }
        public function actionAddMark($id){
            $subject = $this->findModel($id);
            $model = new MarkHistory();
            $model->subject_id = $subject->id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) { 
                return $this->redirect(["view-mark",'id' => $id]);
            }
            return $this->render("addMark",["subject" => $subject, "model" => $model]);
        }
        public function actionViewMark($id){
            $model = MarkHistory::find()->where(["subject_id" => $id]);
            return $this->render("viewMark",["model" => $model]);
        }
        public function actionLogin(){
            return $this->render("login");
        }
        public function actionRegister(){
            return $this->render("register");
        }
        protected function findModel($id)
    {
        if (($model = SubjectHistory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Данная страница не найдена.');
    }

    }
?>