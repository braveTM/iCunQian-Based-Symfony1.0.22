<?php

/**
 * Api Util Methods
 *
 * @package api/lib
 * @author brave <brave.cheng@expacta.com.cn>
 */
class apiUtil
{

    const CODE_SUCCESSFUL           = '200';
    const CODE_NO_CONTENT           = '204';
    const CODE_BAD_REQUEST          = '400';
    const CODE_UNAUTHORIZED         = '401';
    const CODE_FORBIDDEN            = '403';
    const CODE_NOT_FOUND            = '404';
    const CODE_UNPROCESSABLE_ENTITY  = '422';
    
    public static $language = 'en';
    public static $insecure = array(
        'default',
        'Login',
    );

    /**
     * the default language 
     * 
     * @return string
     */
    public static function getDefaultLanguage() {
        return self::$language;
    }
    
    /**
     * the secure modules
     * 
     * @return array
     */
    public static function getInsecureModules() {
        return self::$insecure;
    }

}

?>
