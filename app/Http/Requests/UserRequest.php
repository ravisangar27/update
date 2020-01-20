<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        // $user = $this->route('user');
        // $userId = is_null($user) ? 0 : $user->id;

        // return [
        //     'username' => "required|max:191|unique:users,username,{$userId}", // ignore unique field @update
        //     'email' => "required|max:191|email|unique:users,email,{$userId}", // ignore unique field @update
        //     'password' => 'required_with:create|nullable|min:6|confirmed',
        // ];
    }

    // public function attributes()
    // {
    //     return [
    //         'name' => 'Name',
    //         'street' => 'Straße',
    //         'zip_code' => 'PLZ',
    //         'city' => 'Stadt',
    //         'country' => 'Land',
    //         'phone' => 'Telefon',
    //         'fax' => 'Fax',
    //         'email' => 'E-Mail',
    //         'url' => 'Website',
    //     ];
    // }
}
