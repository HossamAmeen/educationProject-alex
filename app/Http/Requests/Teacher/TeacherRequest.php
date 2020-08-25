<?php

namespace App\Http\Requests\Teacher;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
class TeacherRequest extends FormRequest
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
        // $id = Auth::guard('teacher-api')->user()->id ?? "0" ;
        // $id =  $id == "0" ? $this->request->get("id") : "0";
        if($this->request->get("id") !== null){
            $id = $this->request->get("id") ;
        }
        elseif(Auth::guard('teacher-api')->user() !== null){
            $id = Auth::guard('teacher-api')->user()->id;
        }
        else
            $id = 0 ;
       
        $rules =  [
            'full_name' => ['string', 'max:100'],
            'email' => ['email' , Rule::unique('teachers')->ignore($id)->whereNull('deleted_at') ] ,
            'password' => ['string'],
            'phone' => ['numeric', 'digits_between:11,11' ,Rule::unique('teachers')->ignore($id)->whereNull('deleted_at')],
            'user_name' => ['string', Rule::unique('teachers')->ignore($id)->whereNull('deleted_at')], 
            'file' => ['image']              
        ];
        if ($this->isMethod('POST') )
        {
            $rules['full_name'][] = 'required';
           
            $rules['email'][] = 'required';
            $rules['phone'][] = 'required';
            $rules['password'][] = 'required';
            $rules['user_name'][] = 'required';
           
        }
        if(strpos($this->fullUrl(), "profile") !== false) { 
            $rules['full_name'][] = 'required';
            $rules['email'][] = 'required';
            $rules['phone'][] = 'required';
         
            $rules['user_name'][] = 'required';
        }
        return $rules;
    }
    public $validator = null;
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
