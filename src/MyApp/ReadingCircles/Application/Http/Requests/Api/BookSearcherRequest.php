<?php

namespace MyApp\ReadingCircles\Application\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BookSearcherRequest extends FormRequest
{
	public function rules()
	{
        return [];
	}

	public function authorize()
	{
		return true;
	}
}
