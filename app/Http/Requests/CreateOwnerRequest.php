<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use App\Models\Owner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name
 * @property string $email
 */
class CreateOwnerRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required',Rule::unique('Owners', 'email')->whereNull('deleted_at')],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'オーナー名',
            'email'=> 'メールアドレス',
        ];
    }

}
