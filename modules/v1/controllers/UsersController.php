<?php

namespace app\modules\v1\controllers;

use dektrium\user;
use yii\rest\ActiveController;
use yii;

class UsersController extends ActiveController
{
    public $modelClass = 'dektrium\user\models\User';
    
     public $serializer = [
        'class' => 'app\components\ParseSerializer',
        'collectionEnvelope' => 'results'
    ];
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
             
    }
    
    
    /*
     * Force respond to JSON format
     */    
    public function behaviors()
    {
    return [
        [
            'class' => \yii\filters\ContentNegotiator::className(),         
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ],
    ];
    }
       
}