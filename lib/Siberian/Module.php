<?php
/**
 *
 */
class Siberian_Module {

    /**
     * @var array
     */
    public static $actions = array();

    /**
     * @var array
     */
    public static $menus = array();

    /**
<<<<<<< HEAD
=======
     * @var array
     */
    public static $editor_menus = array();

    /**
>>>>>>> upstream/master
     * @param $feature
     * @param $classname
     */
    public static function addActions($module, $actions = array()) {
        if(!isset(self::$actions[$module])) {
            self::$actions[$module] = $actions;
        }
    }

    /**
     * @param $module
     * @return bool|mixed
     */
    public static function getActions($module) {
        if(isset(self::$actions[$module])) {
            return self::$actions[$module];
        }
        return false;
    }

    /**
<<<<<<< HEAD
     * @param $feature
     * @param $classname
=======
     * @param $module
     * @param $code
     * @param $title
     * @param $link
>>>>>>> upstream/master
     */
    public static function addMenu($module, $code, $title, $link) {
        if(!isset(self::$menus[$module])) {
            self::$menus[$module] = array();
        }

        if(!isset(self::$menus[$module][$code])) {
            self::$menus[$module][$code] = array(
                "title"     => __($title),
                "link"      => $link,
            );
        }
    }

    /**
<<<<<<< HEAD
     * @param $module
     * @return bool|mixed
=======
     * @return array|bool
>>>>>>> upstream/master
     */
    public static function getMenus() {
        if(!empty(self::$menus)) {
            return self::$menus;
        }
        return false;
    }
<<<<<<< HEAD
=======

    /**
     * @param $module
     * @param $code
     * @param $title
     * @param $link
     */
    public static function addEditorMenu($module, $code, $title, $link) {
        if(!isset(self::$editor_menus[$module])) {
            self::$editor_menus[$module] = array();
        }

        if(!isset(self::$editor_menus[$module][$code])) {
            self::$editor_menus[$module][$code] = array(
                "title"     => __($title),
                "link"      => $link,
            );
        }
    }

    /**
     * @return array|bool
     */
    public static function getEditorMenus() {
        if(!empty(self::$editor_menus)) {
            return self::$editor_menus;
        }
        return false;
    }
>>>>>>> upstream/master
}