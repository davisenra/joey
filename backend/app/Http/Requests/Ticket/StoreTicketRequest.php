<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:10|max:200',
            'description' => 'required|string|min:10|max:1000',
            'priority' => 'required|string',
            'categories' => 'array',
            'category.*' => 'string',
            'labels' => 'array',
            'labels.*' => 'string',
            'images' => 'array',
            'images.*' => 'image',
        ];
    }
}
