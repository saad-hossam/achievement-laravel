<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementMediaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|in:image,video',
            'achievement_id' => 'required|exists:achievements,id',
            'file' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'نوع الملف مطلوب',
            'type.in' => 'نوع الملف يجب أن يكون صورة أو فيديو',
            'achievement_id.required' => 'معرّف الإنجاز مطلوب',
            'achievement_id.exists' => 'الإنجاز غير موجود',
            'file.required' => 'الملف مطلوب'
        ];
    }
}
