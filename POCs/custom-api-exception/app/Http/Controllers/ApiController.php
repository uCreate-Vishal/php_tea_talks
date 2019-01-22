<?php

namespace App\Http\Controllers;

use Illuminate\Http\{Request, JsonResponse};
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Validator;

class ApiController extends Controller
{
    private $input;

    public function index()
    {
        return new JsonResponse([
            'data' => ['Hello World!'],
            'message' => 'API Successfull!'
            ],
            200
        );
    }

    public function showCustomException()
    {
        $this->showBadRequestError(['exception' => 'ApiException'], __('messages.error.api_exception'), 400);
    }

    public function showKeyword(Request $request)
    {
        $this->input = $request->all();
        $validation_rules = ['keyword' => 'required'];
        $this->validateInputs($validation_rules);
        $data = [
            'data' => ['keyword' => $this->input['keyword']],
            'message' => 'Keyword Found!'
            ];

        return new JsonResponse($data, 200);
    }

    private function validateInputs($rules)
    {
        $validator = Validator::make($this->input, $rules, __('messages.validation'));

        if ($validator->fails()) {
            $this->showBadRequestError($validator->errors(), __('messages.error.validation'), 400);
        }

        return true;
    }

    private function showBadRequestError($validation_error, $error_message, $http_error_code = 400)
    {
        throw new ApiException($validation_error, $error_message, $http_error_code);
    }
}
