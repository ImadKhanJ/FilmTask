<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmUpdateRequest extends FormRequest
{
    
    public function rules()
    {
        return [

            'name'=>'required',
            'description'=>'required',
            'release_date'=>'required',
            'rating'=>'required',
            'ticket_price'=>'required',
            'country'=>'required',
            'genre'=>'required',
        ];
    }
}
