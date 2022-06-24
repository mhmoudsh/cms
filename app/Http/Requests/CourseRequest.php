<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'course_name'       => 'required',
                    'course_description'=> 'required',
                    'course_price'      => 'required',
                    'category_id'       => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'course_name'       => 'required',
                    'course_description'=> 'required',
                    'course_price'      => 'required',
                    'category_id'       => 'required'

                ];
            }
            default: break;
        }
    }
    /* public function messages(){
        return[


        ];
    } */
}
