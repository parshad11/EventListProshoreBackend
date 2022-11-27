<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EventListEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:mysql.event_details,id',
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date_format:Y-m-d|after:' . date("Y-m-d", strtotime("-1 day")),
            'end_date' => 'required|date_format:Y-m-d|after:' . date("Y-m-d", strtotime("+1 day")),
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'Event list id is required',
            'id.exists' => 'Event list id is invalid',
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'start_date.required' => 'Description is required',
            'start_date.after' => 'Start date cannot be before today',
            'start_date.date_format' => 'Start date format must be yyyy-mm-dd',
            'end_date.after' => 'End date cannot be before tomorrow',
            'end_date.date_format' => 'End date format must be yyyy-mm-dd',
            'end_date.required' => 'Description is required',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $errorsList = (new ValidationException($validator))->errors();
        $counter = 0;
        foreach($errorsList as $key => $errorList) {
            $data[$counter]['target_element'] = $key;
            $data[$counter]['error_message'] = $errorList[0];
            $counter ++;
        }
        $errors = ['status' => 'error',
            'data' => $data,
            'statusCode' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY];

        throw new HttpResponseException(response()->json($errors
            , JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
