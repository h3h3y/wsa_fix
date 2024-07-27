<?php

namespace app\controllers;

use yii\data\ActiveDataFilter;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\CompositeAuth;
use yii\rest\ActiveController;

class BukuController extends ActiveController{
    public $modelClass = 'app\models\Buku';

    //autenticator
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'class' => HttpBearerAuth::class,
            'class' => QueryParamAuth::class,
            'class' => CompositeAuth::class,
            'authMethods' =>[
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ]
        ];
        return $behaviors;
    }

    public function actions()
    {
        $action = parent::actions();
        $action['index']['dataFilter'] = [
            'class' => ActiveDataFilter::class,
            'searchModel' => $this->modelClass
        ];
        return $action;
    }

}
