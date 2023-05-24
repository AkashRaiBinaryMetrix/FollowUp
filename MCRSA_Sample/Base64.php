<?php
/**
 * Created by PhpStorm.
 * User: emmanuel.suy
 * Date: 4/22/2019
 * Time: 11:45 AM
 */
class Base64{

    public static function urlsafe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public static function urlsafe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }



}

?>