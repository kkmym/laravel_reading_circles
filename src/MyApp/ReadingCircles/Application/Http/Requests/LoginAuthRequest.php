<?php

namespace MyApp\ReadingCircles\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAuthRequest extends FormRequest
{
	public function rules()
	{
		return [
			'loginId' => 'required',
        ];
	}

	public function authorize()
	{
		return true;
	}
}
