<?php
namespace app\modules\v1\models;
use dektrium\user\models\User;

class UserApi extends User {
    
    
        public function fields()
     {            
         $fields = parent::fields();
         
         //add some fields 
         $fields['createdAt'] = $fields['created_at'];
         $fields['updatedAt'] = $fields['updated_at'];
         $fields['objectId'] = $fields['id'];                
         
         // remove fields that contain sensitive information
         unset($fields['auth_key'], $fields['password_hash'], $fields['confirmed_at'], $fields['created_at'], $fields['updated_at'], $fields['flags'], $fields['registration_ip'], $fields['unconfirmed_email'], $fields['blocked_at'], $fields['id']);

        
         return $fields;                            

     }
     
     
        public function afterSave()
        {
           
            $this->updated_at = \Yii::$app->formatter->asDatetime($this->updated_at,'php:c');
            $this->created_at = \Yii::$app->formatter->asDatetime($this->updated_at,'php:c');
           
            parent::afterFind();
            return true;
        }
        
        public function afterFind()
        {
           
            $this->updated_at = \Yii::$app->formatter->asDatetime($this->updated_at,'php:c');
            $this->created_at = \Yii::$app->formatter->asDatetime($this->updated_at,'php:c');
           
            parent::afterFind();
            return true;
        }
        
 
        
}

