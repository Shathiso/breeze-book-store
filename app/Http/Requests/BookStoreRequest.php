<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required', 'min:3',
            'description' => 'required', 'min:3',
            'price' => 'required',
            'stock_quantity' => 'required',
            'author_id' => 'required',
            'genre_id' => 'required'
        ];
    }
}
