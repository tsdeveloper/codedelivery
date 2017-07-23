<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;

class CheckoutRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //  return Auth::check();
         return true;

        //  $id = $this->get('id');
        //  echo 'ID: '.$id;
        //  exit ;
        // $usertype = User::find($id);
        // if ($usertype) {
        //     return true;
        // }
        // return false;
    //     $clinicId = \Route::input('id'); //or $this->route('id');

    // return User::where('id', $clinicId)
    // ->where('user_id', Auth::id())
    // ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'cupom_code'=>'exists:cupoms,code,used,0',
//             'items.product_id'=>'required',
//             'client_id'=>'required',
//             'phone',
//             'address',
//             'city',
//             'state',
//             'zipcode'
        ];
    }
}
