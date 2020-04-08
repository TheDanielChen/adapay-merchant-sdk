<?php
/**
 * Created by PhpStorm.
 * User: shuaishuai.niu
 * Date: 2020/3/11
 * Time: 13:33
 */

namespace Cstopery\AdaPayMerchant;
use Cstopery\AdaPay\AdaPay;


class MerchantProfile extends AdaPay
{
    public $endpoint = "/v1/merProfile/merProfilePicture";
    public $audit_endpoint = "/v1/merProfile/merProfileForAudit";

    public function __construct()
    {
        parent::__construct();
    }

    public function merProfilePicture($params){
        $request_params = $params;
        $request_params = $this->do_empty_data($request_params);
        $req_url = self::$gateWayUrl.$this->endpoint;
        ksort($request_params);
        $sign_request_params = $request_params;
        unset($sign_request_params['file']);
        ksort($sign_request_params);
        $sign_str = $this->ada_tools->createLinkstring($sign_request_params);
        $header =  $this->get_request_header($req_url, $sign_str, self::$headerEmpty);
        $this->result = $this->ada_request->curl_request($req_url, $request_params, $header);
    }

    public function merProfileForAudit($params){
        $request_params = $params;
        $request_params = $this->do_empty_data($request_params);
        $req_url = self::$gateWayUrl.$this->audit_endpoint;
        ksort($request_params);
        $sign_str = $this->ada_tools->createLinkstring($request_params);
        $header =  $this->get_request_header($req_url, $sign_str, self::$headerEmpty);
        $this->result = $this->ada_request->curl_request($req_url, $request_params, $header);
    }
}