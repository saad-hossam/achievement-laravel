<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];

        // dynamic validation for translations
        foreach (config('app.languages') as $locale => $name) {
            $rules["$locale.name"] = 'required|string|max:255';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'status.required' => 'حالة القسم مطلوبة',
            'status.in'       => 'قيمة الحالة يجب أن تكون active أو inactive',
            'image.image'     => 'يجب أن يكون الملف صورة',
            'image.mimes'     => 'صيغة الصورة يجب أن تكون jpeg, png, jpg, gif, svg أو webp',
            'image.max'       => 'حجم الصورة لا يجب أن يتجاوز 2 ميجا',

            // رسائل الترجمة
        ] + $this->localeMessages();
    }

    protected function localeMessages()
    {
        $messages = [];
        foreach (config('app.languages') as $locale => $name) {
            $messages["$locale.name.required"] = "اسم القسم باللغة $name مطلوب";
            $messages["$locale.name.string"]   = "اسم القسم باللغة $name يجب أن يكون نص";
            $messages["$locale.name.max"]      = "اسم القسم باللغة $name لا يتجاوز 255 حرف";
        }
        return $messages;
    }
}
