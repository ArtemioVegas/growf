<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address' => 'required|string|max:512',
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/[0-9]{10}/|max:10',
            'tarif' => 'required|int|exists:tarifs,id',
            'delivery_day' => 'required|int',
        ];
    }

    public function messages(): array
    {
        return [
            'address.required' => 'Поле "Адрес" обязательно для заполнения',
            'address.string' => 'Поле "Адрес" должно быть строкой',
            'address.max' => 'Поле "Адрес" должно быть не больше 512 символов',

            'name.required' => 'Поле "Имя" обязательно для заполнения',
            'name.string' => 'Поле "Имя" должно быть строкой',
            'name.max' => 'Поле "Имя" должно быть не больше 255 символов',

            'phone.required'  =>  'Поле "Телефон" обязательно для заполнения',
            'phone.unique' => 'Такой номер телефона уже зарегистрирован',
            'phone.regex' => 'Не верный формат номера телефона',
            'phone.max' => 'Неверный номер телефона',

            'tarif.required'  =>  'Поле "Тариф" обязательно для заполнения',
            'tarif.integer'  =>  'Поле "Тариф" должно быть числом',
            'tarif.exists'  =>  'Указан не существующий тариф',

            'delivery_day.required'  =>  'Поле "День доставки" обязательно для заполнения',
            'delivery_day.integer'  =>  'Поле "День" должно быть числом',
        ];
    }
}
