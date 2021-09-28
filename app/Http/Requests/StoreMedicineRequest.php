<?php

namespace App\Http\Requests;

use App\Rules\MedicineRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicineRequest extends FormRequest
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

            'generic_name' => [
                'required',
                new MedicineRule()
            ],
            'tradename'   => [
                'required',
                new MedicineRule()
            ],
            'concentration' => [
                'required',
                new MedicineRule()
            ]
                /* ,

                'concentration'   => 'required',
                'presentation'   => 'required',
                'laboratory'   => 'required',
                'number_box' => 'required',
                'number_blister' => 'required',
                'utility'    => 'required', */

              /*   'shelf'    => 'required',
                'cost_price' => 'required',

                'sale_price'     => 'required',
                'code'  => 'required',
                'entry_date'   => 'required',
                'expiry_date' => 'required' */
        ];
    }
}
