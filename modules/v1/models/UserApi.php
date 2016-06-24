<?php
namespace app\modules\v1\models;
use dektrium\user\models\User;

class UserApi extends User {
    
    
        public function fields()
     {
         $fields = parent::fields();
         // remove fields that contain sensitive information         
         $fields['createdAt'] = $fields['created_at'];
         $fields['updatedAt'] = $fields['updated_at'];
         $fields['objectId'] = $fields['id'];
         unset($fields['auth_key'], $fields['password_hash'], $fields['confirmed_at'], $fields['created_at'], $fields['updated_at'], $fields['flags'], $fields['registration_ip'], $fields['unconfirmed_email'], $fields['blocked_at'], $fields['id']);

         return $fields;                            

     }
    
}

