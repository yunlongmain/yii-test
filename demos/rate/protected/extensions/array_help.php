<?php
/**
 * Created by PhpStorm.
 * User: yunlong
 * Date: 14-10-17
 * Time: 下午8:07
 */

if ( ! function_exists('array_add_key'))
{
    function array_add_key($result,$key) {
        if(empty($key)) {
            return $result;
        } else {
            $keyResult = array();
            foreach($result as $v) {
                $keyResult[$v[$key]] = $v;
            }
            return $keyResult;
        }
    }
}

if ( ! function_exists('array_add_rank'))
{
    function array_add_rank($data) {
        $rank = 1;
        foreach($data as &$v) {
            $v['rank'] = $rank++;
        }
        return $data;
    }
}