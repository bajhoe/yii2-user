<?php

namespace bajhoe\user\traits;

use bajhoe\user\Module;

/**
 * Trait ModuleTrait
 *
 * @property-read Module $module
 * @package bajhoe\user\traits
 */
trait ModuleTrait
{
    /**
     * @return Module
     */
    public function getModule()
    {
        return \Yii::$app->getModule('user');
    }

    /**
     * @return string
     */
    public static function getDb()
    {
        return \Yii::$app->getModule('user')->getDb();
    }
}
