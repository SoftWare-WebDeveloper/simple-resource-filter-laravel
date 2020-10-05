<?php

namespace App\Http\Traits;

trait Responses {

    public function successResponse($data,$code = 200) {

        return response()->json([
            "status" => "success",
            "code" => $code,
            "data" => $data
        ])->setStatusCode($code);

    }

    public function badRequestResponse($message,$code = 400) {

        return response()->json([
            "status" => "error",
            "code"  => $code,
            "message" => $message
        ])->setStatusCode($code);

    }

}