<?php
/**
 * [route_class] [返回当前路由下的class_name]
 * @return mixed
 */
function route_class(){
    return str_replace('.','_',Route::currentRouteName());
}