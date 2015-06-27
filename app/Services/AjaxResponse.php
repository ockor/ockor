<?php namespace App\Services;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/26
 * Time: 23:17
 */

class AjaxResponse {

    protected function ajaxResponse($code, $message, $data = null)
    {
        $out = [
            'code' => $code,
            'message' => $message,
        ];

        if ($data !== null) {
            $out['html'] = $data;
        }

        return response()->json($out);
    }

    public function success($data = null)
    {
        return $this->ajaxResponse(0, '', $data);
    }

    public function fail($message, $extra = [])
    {
        return $this->ajaxResponse(1, $message, $extra);
    }
}