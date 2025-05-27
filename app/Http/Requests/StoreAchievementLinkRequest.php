<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'achievement_id' => 'required|exists:achievements,id',
            'url' => 'required|array',
            'url.*' => 'required|url'
        ];

        // dynamic validation for each language translation titles
        foreach (config('app.languages') as $locale => $name) {
            $rules["$locale.title"] = 'required|array';
            $rules["$locale.title.*"] = 'required|string|max:255';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'achievement_id.required' => 'يجب تحديد الإنجاز',
            'achievement_id.exists' => 'الإنجاز المحدد غير موجود',
            'url.required' => 'يجب إدخال روابط',
            'url.array' => 'يجب أن تكون الروابط في شكل مصفوفة',
            'url.*.required' => 'كل رابط مطلوب',
            'url.*.url' => 'كل رابط يجب أن يكون بصيغة صحيحة',
        ];
    }
}
