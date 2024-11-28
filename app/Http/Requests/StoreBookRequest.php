<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => $this->getTitleRules(),
            'description' => $this->getDescriptionRules(),
            'pages' => $this->getPagesRules(),
            'author_id' => $this->getAuthorIdRules(),
            'category_id' => $this->getCategoryIdRules(),
            'image' => $this->getImageRules(),
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
            'title.required' => 'Il titolo è obbligatorio.',
            'description.max' => 'La descrizione non può superare gli 800 caratteri.',
            'pages.integer' => 'Il numero di pagine deve essere un numero intero.',
            'author_id.required' => 'Devi selezionare un autore.',
            'category_id.required' => 'Devi selezionare una categoria.',
            'image.image' => 'Il file caricato deve essere un\'immagine.',
            'image.mimes' => 'L\'immagine deve essere in formato jpeg, png o jpg.',
        ];
    }

    private function getTitleRules(): array
    {
        return ['required', 'string', 'max:255'];
    }

    private function getDescriptionRules(): array
    {
        return ['nullable', 'string', 'max:800'];
    }

    private function getPagesRules(): array
    {
        return ['nullable', 'integer', 'min:1'];
    }

    private function getAuthorIdRules(): array
    {
        return ['required', 'exists:authors,id'];
    }

    private function getCategoryIdRules(): array
    {
        return ['required', 'exists:categories,id'];
    }

    private function getImageRules(): array
    {
        return ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
    }
}
