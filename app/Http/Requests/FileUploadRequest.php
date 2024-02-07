<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class FileUploadRequest extends FormRequest
{
    protected array $allowedFileTypes = [
        'png', 'jpg', 'jpeg', 'gif', 'svg', 'webp', 'mp3', 'mp4', 'mov', 'pdf', 'docx', 'xlsx',
    ];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ! is_null($this->get('project'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', 'file', File::default()->types($this->allowedFileTypes)],
            'path' => ['required', 'string', 'max:255'],
        ];
    }
}
