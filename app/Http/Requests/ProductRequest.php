<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'sltParent' =>'numeric|min:1',
            'txtName' => 'required|unique:products,name',
            'fImages' => 'required|image'
        ];
    }
    public function messages(){
        return [
            'sltParent.min' => 'Vui lòng chọn Category chứa sản phẩm',
            'fImages.image' => 'Vui lòng chọn file hình ảnh',
            'txtName.required' => 'Vui lòng nhập tên sản phẩm',
            'txtName.unique'   => 'Tên sản phẩm đã tồn tại',
            'fImages.required' => 'Vui lòng chọn ảnh đại diện hoặc ảnh đại diện có kích thước quá lớn'  
        ];
    }
}
