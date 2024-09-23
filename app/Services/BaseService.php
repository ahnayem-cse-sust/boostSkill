<?php


namespace App\Services;


abstract class BaseService
{
    protected function success($message, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'status_code' => $status,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $status = 422)
    {
        return response([
            'success' => false,
            'status_code' => $status,
            'message' => $message,
        ], $status);
    }
    
}