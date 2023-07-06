<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        //si la route est .store l'image sera required
        //si la route est .update l'image sera required seulement si elle est remplie dans le formulaire
        if (request()->routeIs('category.store')) {
            $imageRule = 'required|image';
        } elseif (request()->routeIs('category.update')) {
            $imageRule = 'nullable|image';
        }

        return [
            'name' => 'required|string',
            'desc' => 'required',
            'color' => 'required|string',
            'image' => $imageRule,
        ];
        
    }

    protected function prepareForValidation()
    {
        if ($this->image === null) {
            $this->request->remove('image');
        }
    }
}
