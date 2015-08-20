<?php
/**
 * Highlight 语法高亮
 * 
 * @package Highlight
 * @author tlm
 * @version 1.0.0
 * @link
 */
class Highlight_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('Highlight_Plugin', 'footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){

    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 输出尾部js
     * 
     * @access public
     * @param unknown $footer
     * @return unknown
     */
    public static function footer() {
        $cssUrl = Helper::options()->pluginUrl . '/Highlight/styles/darkula.css';
        $jsUrl = Helper::options()->pluginUrl . '/Highlight/highlight.pack.js';
        echo '<script type="text/javascript" src="'. $jsUrl .'"></script>';
        echo '<link rel="stylesheet" href="'. $cssUrl .'">';
        echo '<script type="text/javascript">hljs.initHighlightingOnLoad();</script>';
    }
}
