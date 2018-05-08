<?php
use core\Config;
use core\filter\Filter;
use core\lib\Session;
use core\lib\Cookie;

if (!function_exists('config'))
{
    /**
     * [config 获取和设置配置参数]
     * ------------------------------------------------------------------------------
     * @author  by.fan <fan3750060@163.com>
     * ------------------------------------------------------------------------------
     * @version date:2018-01-04
     * ------------------------------------------------------------------------------
     * @param   string          $name  [参数名]
     * @param   [type]          $value [参数值]
     * @param   string          $range [作用域]
     * @return  [type]                 [description]
     */
    function config($name = '', $value = null, $range = '')
    {
        if (is_null($value) && is_string($name)) {
            return 0 === strpos($name, '?') ? Config::has(substr($name, 1), $range) : Config::get($name, $range);
        } else {
            return Config::set($name, $value, $range);
        }
    }
}

if (!function_exists('input'))
{
    /**
     * [input 获取输入数据 支持默认值和过滤]
     * ------------------------------------------------------------------------------
     * @author  by.fan <fan3750060@163.com>
     * ------------------------------------------------------------------------------
     * @version date:2018-01-04
     * ------------------------------------------------------------------------------
     * @param   string          $key    [获取的变量名]
     * @param   string          $filter [过滤方法 int,string,float,bool]
     * @return  [type]                  [description]
     */
    function input($key = '',$filter = '')
    {
        $param = json_decode(ARGV,true);
        unset($param[0]);
        unset($param[1]);
        sort($param);
        return $param;
    }
}

if (!function_exists('session'))
{
    /**
     * [session]
     * ------------------------------------------------------------------------------
     * @author  by.fan <fan3750060@163.com>
     * ------------------------------------------------------------------------------
     * @version date:2018-01-02
     * ------------------------------------------------------------------------------
     * @param   string          $key   [参数名]
     * @param   string          $value [参数值]
     * @return  [type]                 [description]
     */
    function session($key = null,$value = '_null')
    {

        if (is_null($key) || !$key)
        {
            return Session::boot()->all();
        }elseif($key && $value === '_null')
        {
            return Session::boot()->get($key);
        }elseif($key && $value !== '_null')
        {
            return Session::boot()->set($key,$value);
        }
    }
}

if (!function_exists('cookie'))
{
    /**
     * [cookie]
     * ------------------------------------------------------------------------------
     * @author  by.fan <fan3750060@163.com>
     * ------------------------------------------------------------------------------
     * @version date:2018-01-05
     * ------------------------------------------------------------------------------
     * @param   string          $key   [参数名]
     * @param   string          $value [参数值]
     * @param   integer         $time  [过期时间]
     * @return  [type]                 [description]
     */
    function cookie($key = null,$value = '_null',$time = 0)
    {
        if (is_null($key) || !$key)
        {
            return Cookie::boot()->all();
        }elseif($key && $value === '_null')
        {
            return Cookie::boot()->get($key);
        }elseif($key && $value !== '_null')
        {
            return Cookie::boot()->set($key,$value,$time);
        }
    }
}