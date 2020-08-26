<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Auth;
class AdminRequest extends FormRequest
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
        elseif(Auth::guard('api')->user() !== null){
            $id = Auth::guard('api')->user()->id;
        }
        else
            $id = 0 ;

            $rules =  [
                'user_name' => ['string', Rule::unique('users')->ignore($id)->whereNull('deleted_at')], 
                'name' => ['string', 'max:100'],
                'password' => ['string'],
                'phone' => ['numeric', 'digits_between:11,11' ,Rule::unique('users')->ignore($id)->whereNull('deleted_at')],
                'email' => ['email' , Rule::unique('users')->ignore($id)->whereNull('deleted_at') ] ,
                'role' => ['string', 'max:100' ,'required'],
                'image' => ['string'],
                'file' => ['image']       
            ];
            if ($this->isMethod('POST') )
            {
              
                $rules['user_name'][] = 'required';
                $rules['name'][] = 'required';
                $rules['password'][] = 'required';
                
                $rules['email'][] = 'required';
               
              
               
               
            }
            // if(strpos($this->fullUrl(), "profile") !== false) { 
               
            //     $rules['email'][] = 'required';
            //     $rules['phone'][] = 'required';
             
            //     $rules['user_name'][] = 'required';
            // }
        return $rules;
        
    }
    public $validator = null;
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
