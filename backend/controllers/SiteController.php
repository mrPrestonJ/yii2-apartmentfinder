<?php
namespace backend\controllers;

use yii\helpers\Url;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $sections = [
            [
                'title' => 'Cities',
                'description' => 'This section give you possibility to create|update|delete|list Cities',
                'link' => Url::to('city/index'),
            ],
            [
                'title' => 'New Buildings',
                'description' => 'This section give you possibility to create|update|delete|list New Buildings',
                'link' => Url::to('new-building/index'),
            ],
            [
                'title' => 'Sections',
                'description' => 'This section give you possibility to create|update|delete|list Sections',
                'link' => Url::to('section/index'),
            ],
            [
                'title' => 'Apartments',
                'description' => 'This section give you possibility to create|update|delete|list Apartments',
                'link' => Url::to('apartment/index'),
            ],
        ];
        $sectionGroupCount = 12 / count($sections);
        return $this->render('index', [
            'sections' => $sections,
            'sectionGroupCount' => $sectionGroupCount,

        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
