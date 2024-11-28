<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determina se l'utente è autorizzato a effettuare questa richiesta.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regole di validazione per la richiesta.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
        ];
    }

    /**
     * Messaggi personalizzati di errore.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Il nome della categoria è obbligatorio.',
            'name.string' => 'Il nome della categoria deve essere una stringa.',
            'name.max' => 'Il nome della categoria non può superare i 255 caratteri.',
            'name.unique' => 'Il nome della categoria deve essere univoco.',
        ];
    }

    /**
     * Regole di validazione per il nome.
     *
     * @return array<string>
     */
    private function getNameRules(): array
    {
        return ['required', 'string', 'max:255'];
    }
}
