<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'executive_id'   => ['required', 'exists:executives,id'],
            'category_id'    => ['required', 'exists:event_categories,id'],

            'title'          => ['required', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],

            'location'       => ['nullable', 'string', 'max:255'],
            'meeting_url'    => ['nullable', 'url'],

            'start_datetime' => ['required', 'date'],
            'end_datetime'   => ['required', 'date', 'after_or_equal:start_datetime'],

            'is_all_day'     => ['boolean'],

            'priority'       => ['required'],
            'status'         => ['required'],
            'visibility'     => ['required'],

            'color'          => ['nullable', 'string', 'max:20'],
        ];
    }
}