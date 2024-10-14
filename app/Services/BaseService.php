<?php


namespace App\Services;


abstract class BaseService
{
    protected function success($message, $data = [], $status = 200)
    {
        return [
            'success' => true,
            'status_code' => $status,
            'data' => $data,
            'message' => $message,
        ];
    }

    protected function failure($message, $status = 422)
    {
        return [
            'success' => false,
            'status_code' => $status,
            'message' => $message,
        ];
    }
    
}