<?php

namespace backend\controllers;

use common\models\UserProfile;
use Yii;
use common\models\Project;
use backend\models\search\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Tag;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
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
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        $tags = Tag::find()->all();
        $taglist = array();
        foreach ($tags as $num => $item)
        {
            array_push($taglist,$item->getTagName());
        }
        $teachers = UserProfile::find()->where('user_id in(select userid from dbis_user_teacher)')->all();
        if ($model->load(Yii::$app->request->post())) {
            $selecttagid = array();
            if (is_array($model->tagid)) {
                foreach ($model->tagid as $num => $item) {
                    array_push($selecttagid, $item+1);
                }
                $model->tagid = implode(',', $selecttagid);
                if($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }else {
            return $this->render('create', [
                'model' => $model,
                'teachers' => $teachers,
                'taglist' => $taglist,
            ]);
        }

    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tags = Tag::find()->all();
        $taglist = array();
        foreach ($tags as $num => $item)
        {
            array_push($taglist,$item->getTagName());
        }
        if ($model->load(Yii::$app->request->post())) {
            $selecttagid = array();
            if (is_array($model->tagid)) {
                foreach ($model->tagid as $num => $item) {
                    array_push($selecttagid, $item+1);
                }
                $model->tagid = implode(',', $selecttagid);
                if($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'teachers' => UserProfile::find()->where('user_id in(select userid from user_teacher)')->all(),
                'taglist' => $taglist,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
