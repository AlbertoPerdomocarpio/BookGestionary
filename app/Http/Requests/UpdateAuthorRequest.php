<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
{
    /**
     * Determina se l'utente è autorizzato a effettuare questa richiesta.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Permette a tutti di usare questa request
    }

    /**
     * Regole di validazione per la richiesta.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => $this->getNameRules(),
            'birthday' => $this->getBirthdayRules(),
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
            'name.required' => 'Il campo "Nome" è obbligatorio.',
            'name.max' => 'Il nome non può superare i 255 caratteri.',
            'birthday.date' => 'Il campo "Data di Nascita" deve contenere una data valida.',
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

    /**
     * Regole di validazione per la data di nascita.
     *
     * @return array<string>
     */
    private function getBirthdayRules(): array
    {
        return ['nullable', 'date'];
    }
}
