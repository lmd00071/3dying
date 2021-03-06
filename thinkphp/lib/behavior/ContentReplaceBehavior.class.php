<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: ContentReplaceBehavior.class.php 2777 2012-02-23 13:07:50Z liu21st $

/**
 +------------------------------------------------------------------------------
 * 系统行为扩展 模板内容输出替换
 +------------------------------------------------------------------------------
 */
class ContentReplaceBehavior extends Behavior {

    // 行为扩展的执行入口必须是run
    public function run(&$content){
        $content = $this->templateContentReplace($content);
    }

    /**
     +----------------------------------------------------------
     * 模板内容替换
     +----------------------------------------------------------
     * @access protected
     +----------------------------------------------------------
     * @param string $content 模板内容
     +----------------------------------------------------------
     * @return string
     +----------------------------------------------------------
     */
    protected function templateContentReplace($content) {
        // 系统默认的特殊变量替换
        
        $replace =  array(
            //'__TMPL__'   => APP_TMPL_PATH,  // 项目模板目录
             '__APP__'    => __APP__,        // 当前项目地址
            //'__ACTION__' => __ACTION__,     // 当前操作地址
            //'__SELF__'   => __SELF__,       // 当前页面地址
            //'__URL__'    => __URL__,
            '../Public'  => __ROOT__ . '/Public',// 项目公共模板目录
        );
        $content = str_replace(array_keys($replace),array_values($replace),$content);
        return $content;
    }

}