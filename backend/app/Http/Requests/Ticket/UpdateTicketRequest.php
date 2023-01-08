<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|min:10|max:200',
            'description' => 'string|min:10|max:1000',
            'priority' => 'string',
            'categories' => 'array',
            'category.*' => 'string',
            'labels' => 'array',
            'labels.*' => 'string',
            'images' => 'array',
            'images.*' => 'image',
        ];
    }
}
