<?php

/*
 * This class extends Serialzer with my custom methods.
 * Serializer prepare data fot json encode. Gulp!
 */
namespace app\components;

use yii\rest\Serializer;

class ParseSerializer extends Serializer 
{
    public function serialize($data) 
    {
        $d = parent::serialize($data);
            
        unset($d['_meta'], $d['_links']);
        return $d;
    }
}
