<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SessionUpdateOrStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('POST'))
        {
            return [
                'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
                'password' => ['required', 'max:255'],
            ];
        }
        else{
            return [
                'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
                'password' => ['required', 'max:255'],
                'new_email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
                'new_password' => ['required', 'min:7', 'max:255'],
            ];
        }
    }
}
