<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerArrival;
use App\Models\PartnerUser;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class BuyController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->checkAuth();
        return view('buy');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Request $request)
    {
        $this->checkAuth();
        $this->validator($request);
        $errors = new ViewErrorBag();
        $customer = $this->getCustomer($request, $errors);
        if ($errors->hasBag('default') > 0) {
            return view('buy', compact('errors', $request));
        }

        $return = [
            'request' => $request->all()
        ];

        /** @var CustomerArrival $customerArrival */
        $customerArrival = new CustomerArrival();
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
        /** TODO: alert if all right */
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

    /**
     * @param Request $request
     * @param $errors
     * @return Customer|null
     */
    public function getCustomer(Request $request, ViewErrorBag &$errors): ?Customer
    {
        $customerCollection = Customer
            ::where('walletId', '=', $request->input('wallet'))
            ->get();

        if (!isset($customerCollection[0])) {
            /** @var User[] $customerUser */
            $customerUser = User
                ::where('phone', '=', $request->input('phone'))
                ->get();
            if (isset($customerUser[0])) {
                /** @var Customer[] $customerCollection */
                $customerCollection = Customer
                    ::where('user_id', '=', $customerUser[0]->id)
                    ->get();
            }
        }

        if (!isset($customerCollection[0])) {
            $messageBag = new MessageBag();
            $messageBag->add(
                $request->input('wallet') ? 'wallet' : 'phone',
                "Покупатель с такими данными не найден"
            );

            $errors->put('default', $messageBag);

            /** TODO: bad way, we need one return. let's find best practices */
        } else {
            /** @var Customer $customer */
            $customer = $customerCollection[0];
        }

        return $customer ?? null;
    }

    public function checkAuth()
    {
        /** @var User $user */
        $user = Auth::user();
        if (!isset($user) || $user->user_type_id != User::PARTNER_USER_TYPE_ID) {
            throw new AccessDeniedHttpException('Access Denied');
        }
    }

}
