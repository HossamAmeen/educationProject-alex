<?php

namespace App\Http\Requests\Student;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
class StudentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if($this->request->get("id") !== null){
            $id = $this->request->get("id") ;
        }
        elseif(Auth::guard('student-api')->user() !== null){
            $id = Auth::guard('student-api')->user()->id;
        }
        else
            $id = 0 ;
           
        $rules =  [
            'full_name' => ['string', 'max:100'],
            'email' => ['email' , Rule::unique('students')->ignore($id)->whereNull('deleted_at') ] ,
            'password' => ['string'],
            'level' => ['string'],
            
            'phone' => ['numeric', 'digits_between:11,11' ,Rule::unique('students')->ignore($id)->whereNull('deleted_at')],
            'parent_phone' => ['numeric', 'digits_between:11,11'],
            // 'user_name' => ['string', Rule::unique('teachers')->ignore($id)->whereNull('deleted_at')], 
            'file' => ['image']              
        ];
        if(strpos($this->fullUrl(), "register") !== false)
        {
            $rules['full_name'][] = 'required';
            $rules['email'][] = 'required';
            $rules['phone'][] = 'required';
            $rules['parent_phone'][] = 'required';
            $rules['password'][] = 'required';
            
            // $rules['user_name'][] = 'required';
           
        }
        // $rules['full_name'][] = 'required';
        // $rules['email'][] = 'required';
        // $rules['phone'][] = 'required';
        // $rules['parent_phone'][] = 'required';
        // $rules['password'][] = 'required';
        return $rules;
    }
    public $validator = null;
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
