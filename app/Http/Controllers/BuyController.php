<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerArrival;
use App\Models\PartnerUser;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use PhpParser\Error;
use Validator;

class BuyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('buy');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Request $request)
    {
        $this->validator($request);

        $customerCollection = Customer::where('walletId', '=', $request->input('wallet'))->get();
        $return = [
            'request' => $request->all()
        ];

        /** @var CustomerArrival $customerArrival */
        $customerArrival = new CustomerArrival();

        if (!isset($customerCollection[0])) {
            $errors = new MessageBag();
            $errors->add(
                $request->input('wallet') ? 'wallet' : 'phone',
                "Покупатель с такими данными не найден"
            );
            return view('buy', compact('errors', $request));

        }
        /** @var Customer $customer */
        $customer = $customerCollection[0];
        $customerArrival->customers_id = $customer->id;
        /** @var PartnerUser $partnerUsers */
        $partnerUsers = Auth::user()->partnerUsers()->getResults();

        $customerArrival->partners_id = $partnerUsers->partner_id;
        $customerArrival->value = $request->input('sum');
        $customerArrival->bonuses = $customerArrival->countBonuses($customerArrival->value);

        $customerArrival->save();

        $customer->balance = $customer->balance + $customerArrival->bonuses;
        $customer->save();

        $return['ok'] =
            'Пользователю ' .
            $customer->user->name .
            ' с номером ' .
            $customer->user->phone .
            'начислено ' .
            $customerArrival->bonuses .
            ' баллов';
        return view('buy', compact('return'));
    }

    /**
     * @param Request $request
     */
    public function validator(Request $request)
    {
        $this->validate($request, [
            'wallet' => 'required_without:phone|max:55|min:5',
            'phone' => 'required_without:wallet|max:55|min:7',
            'sum' => 'required|min:1',
        ]);
    }

}
