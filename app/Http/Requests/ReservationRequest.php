<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Session;
use App\Traits\ProcDeviceName;

class ReservationRequest extends Request
{
	// To get proc and device name for storing them in session
	use ProcDeviceName;
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
            //
					'name'=>'required|min:2|max:100',
					'gender'=>'required',
					'sin'=>'size:14|unique:patients,sin',
					'address'=>'min:3',
					'nationality'=>'min:3',
					'phone_number'=>'min:4|max:20',
					'year_age' => 'numeric|required_without_all:month_age,day_age',
        ];
    }

	public function messages()
	{
		return [
			'year_age.numeric' => 'حقل عدد السنين يجب ان يكون رقم فقط.',
			'year_age.required_without_all' =>'حقل عدد السنين يجب أن يكون أكبر من 0 فى حالة عدم وجود عدد أيام أو عدد أشهر',
		];
	}

}
