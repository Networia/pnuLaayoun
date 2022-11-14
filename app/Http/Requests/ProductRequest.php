<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'serie_peneu' => ['string', 'max:255' , 'nullable' ],
            'marque_peneu' => ['string', 'max:255' , 'nullable' ],
            'reference_filter' => ['string', 'max:255' , 'nullable' ],
            'marque_filter' => ['string', 'max:255' , 'nullable' ],
            'marque_baterie' => ['string', 'max:255' , 'nullable'  ],
            'num_voltage' => ['string', 'max:255' , 'nullable'  ],
            'serie_chambrere' => ['string', 'max:255' , 'nullable'  ],
            'marque_chambrere' => ['string', 'max:255' , 'nullable'  ],
            'serie_huile' => ['string', 'max:255' , 'nullable'  ],
            'marque_huile' => ['string', 'max:255' , 'nullable'  ],
            'lettrage_huile' => ['numeric', 'max:255' , 'nullable'  ],
            'prix_achat' => ['required', 'numeric'],
            'prix_vente' => ['required' , 'numeric'],
            'quantite_dispo' => ['numeric'],
        ];

    }
}
