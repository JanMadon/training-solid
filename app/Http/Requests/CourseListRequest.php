<?php

namespace App\Http\Requests;

use App\Queries\CourseListQuery;
use Illuminate\Foundation\Http\FormRequest;

class CourseListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        dump($this->get('sort_price'));
        return [
            'category_id' => ['nullable', 'array'],
            'category_id.*' => ['exists:categories,id'],
            'instruction_level_id' => ['nullable', 'array'],
            'instruction_level_id.*' => ['exists:instruction_levels,id'],
            'price_id' => ['nullable', 'array'],
            'price_id.*' => ['nullable', 'string'],
            'sort_price' => ['nullable', 'string', 'in:asc,desc'],
            'per_page' => 'nullable|integer|min:1|max:100'
        ];
    }

    public function getQuery(): CourseListQuery
    {
        return new CourseListQuery(
            $this->get('category_id'),
            $this->get('instruction_level_id'),
            $this->get('price_id'),
            $this->get('sort_price', 'asc'),
            $this->get('per_page', 9)
        );
    }
}
