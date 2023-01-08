<?php

namespace App\Http\Requests\Ticket;

use App\Rules\User\IsAgent;
use Illuminate\Foundation\Http\FormRequest;

class AssignTicketToAgentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'agent' => [
                'required', 'string', 'uuid', new IsAgent,
            ],
        ];
    }
}
