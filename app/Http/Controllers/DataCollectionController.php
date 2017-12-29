<?php

namespace App\Http\Controllers;

use App\Handlers\DataCollectionHandler;
use Illuminate\Http\Request;
use QL\QueryList;

class DataCollectionController extends Controller
{

    public function index(Request $request, DataCollectionHandler $collect)
    {

//        $proxy = Request::create('/topics','POST');
//        $response = \Route::dispatch($proxy);
//        $response = $response->getContent();
//        $response = json_decode($response, true);
//        dd($response);

        $data = QueryList::get('https://www.amazon.co.jp/s/ref=s9_acss_bw_ct_pan2016_ct18_cta_w?__mk_ja_JP=%83%4A%83%5E%83%4A%83%69&search-alias=watch&bbn=3534638051&pf_rd_m=A3P5ROKL5A1OLE&pf_rd_s=merchandised-search-18&pf_rd_r=MJE45NFR1GR4HED8T70F&pf_rd_t=101&pf_rd_p=fc371120-de46-4d93-944b-6421592740c3&pf_rd_i=3534638051')
            // 设置采集规则
            ->rules([
                'img' => array('img', 'src'),
                'name' => array('h2', 'text'),
                'money_section' => array('span.a-size-base.a-color-price.s-price.a-text-bold', 'text'),
                'new_money' => array('span.a-size-base.a-color-price.a-text-bold:eq(1)', 'text'),
                'new_money_two' => array('span.a-size-base.a-color-price.a-text-bold', 'text'),
                'old_money' => array('span.a-size-base.a-color-price.a-text-bold:eq(2)', 'text')
            ])
            ->range('.s-item-container')
            ->query()->getData();
        dd($data);


//        # 模拟登陆
//        $html = 'https://www.amazon.cn/ap/signin?_encoding=UTF8&ignoreAuthState=1&openid.assoc_handle=cnflex&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.mode=checkid_setup&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&openid.ns.pape=http%3A%2F%2Fspecs.openid.net%2Fextensions%2Fpape%2F1.0&openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.cn%2F%3Fref_%3Dnav_ya_signin%26%26nocache%3D1514447920171%26ref_%3Dnav_ya_signin&switch_account=';
//// 获取QueryList实例
//        $ql = QueryList::getInstance();
////获取到登录表单
//        $form = $ql->get($html)->find('form');
//        dd($form);
////填写用户名和密码
//        $form->find('input[name=email]')->val('18814833748');
//        $form->find('input[name=password]')->val('9426521');
//
////序列化表单数据
//        $fromData = $form->serializeArray();
//        $postData = [];
//        foreach ($fromData as $item) {
//            $postData[$item['name']] = $item['value'];
//        }
//
////提交登录表单
//        $actionUrl = $html.$form->attr('action');
//        $ql->post($actionUrl,$postData);
//        dd($ql->getHtml());
//        // dd($res);
////判断登录是否成功
//        //echo $ql->getHtml();
//        $userName = $ql->find('div#nav-tools')->html();
//        dd($userName);
//        if($userName)
//        {
//            echo '登录成功!欢迎你:'.$userName;
//        }else{
//            echo '登录失败!';
//        }
//    }


    }


}


