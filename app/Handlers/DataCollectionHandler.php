<?php

namespace App\Handlers;

use QL\QueryList;

class DataCollectionHandler
{


    // 将html转换为数据
    public function collect($html,$rules,$range = null){
        $data = QueryList::html($html)
            ->rules($rules)
            ->range($range)
            ->query()
            ->getData();
        return $data->all();
    }

    // 设置待采集的html源码
    public function setHtml($url){
        $html = file_get_contents($url);
        $ql = QueryList::html($html);
        $html = $ql->getHtml();
        return $html;
    }
}