<?php
/**
 * LaTex 公式解析
 * 
 * @package LaTex
 * @author tlm
 * @version 1.0.0
 * @link
 */
class LaTex_Plugin implements Typecho_Plugin_Interface
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
        Typecho_Plugin::factory('Widget_Archive')->footer = array('LaTex_Plugin', 'footer');
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
        echo '<script type="text/javascript">latex.parse("'. $mark. '");</script>';
        echo '<script type="text/javascript" src="'. $this->options->adminStaticUrl('js', 'katex/katex.min.js'). '"></script';
        echo '<link rel="stylesheet" href="'. $this->options->adminStaticUrl('js', 'katex/katex.min.css'). '>';
        $jsUrl = Helper::options()->pluginUrl . '/LaTex/latex.js';
        echo '<script type="text/javascript" src="'. $jsUrl .'"></script>';
    }
}
