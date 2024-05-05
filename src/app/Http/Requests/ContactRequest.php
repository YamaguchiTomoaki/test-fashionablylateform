<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'toptel' => ['required', 'numeric', 'digits_between:1,5'],
            'middletel' => ['required', 'numeric', 'digits_between:1,5/'],
            'bottomtel' => ['required', 'numeric', 'digits_between:1,5/'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['string', 'max:255'],
            'category_id' => 'prohibited_if:category_id,null',
            'detail' => ['required', 'string', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を文字列で入力してください',
            'first_name.max' => '名を255文字以内で入力してください',
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を文字列で入力してください',
            'last_name.max' => '姓を255文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',
            'toptel.required' => '電話番号を入力してください',
            'toptel.numeric' => '電話番号は5桁までの数字で入力してください',
            'toptel.digits_between' => '電話番号は5桁までの数字で入力してください',
            'middletel.required' => '電話番号を入力してください',
            'middletel.numeric' => '電話番号は5桁までの数字で入力してください',
            'middletel.digits_between' => '電話番号は5桁までの数字で入力してください',
            'bottomtel.required' => '電話番号を入力してください',
            'bottomtel.numeric' => '電話番号は5桁までの数字で入力してください',
            'bottomtel.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'address.strind' => '住所を文字列で入力してください',
            'address.max' => '住所を255文字以内で入力してください',
            'building.string' => '建物名を文字列で入力してください',
            'building.max' => '建物名を255文字以内で入力してください',
            'prohibited_if' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.string' => 'お問い合わせ内容を文字列で入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください'
        ];
    }
}
