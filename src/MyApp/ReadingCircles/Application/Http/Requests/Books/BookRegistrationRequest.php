<?php

namespace MyApp\ReadingCircles\Application\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookRegistrationRequest extends FormRequest
{
	public function rules()
	{
		return [
            'isbn' => 'required',
            'title' => 'required',
        ];
	}

	public function authorize()
	{
		return true;
	}
}
