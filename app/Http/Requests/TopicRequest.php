<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':

                // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        // CREATE ROLES
                        'title' => 'required|between:2,30|unique:topics',
                        'category_id' => 'required|numeric',
                        'body' => 'required|between:2,65535',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                };
        }
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
