<?php

namespace app\modules\v1\controllers;

//use dektrium\user;
use yii\rest\ActiveController;
use yii;

class UsersController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\UserApi';
    
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
    public function actionRegister () {
      
    }
    */
    
    public function afterAction($action, $result){

        $result = parent::afterAction($action, $result);
        
        if($action->id == 'update') {
            
             return [
               'updatedAt' => $result['updatedAt'],
             ];
             }
             
        if($action->id == 'create') {
            
         //token  
           // $token = \dektrium\user\models\Token::findOne(['user_id' => $result['objectId']]);  
               //$token->code  
            if(isset($result['createdAt'])) {
                return [
                  'createdAt' => $result['createdAt'],   
                  'objectId' => $result['objectId'], 
                  'sessionToken' => 'null',
                ];
            }
             }   
             
   
        return $result;
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