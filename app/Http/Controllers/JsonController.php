<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 02.10.2016
 * Time: 2:20
 */

namespace App\Http\Controllers;


use App\Http\Controllers\Auth\JsonAuthController;
use App\Models\User;
use App\Models\Customer;
use App\Schemas\CustomerSchema;
use App\Schemas\SchemaFactory;
use App\Schemas\UserSchema;

use Illuminate\Contracts\View\View;

use Illuminate\Http\Request;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;


class JsonController extends Controller
{
    protected $prefixUrl = "http://example.com/api/v1";

    /**
     * @param int $userId
     * @return View
     */
    public function getUser (int $userId): View
    {
        $user = User::find($userId);

        /** @var Encoder $encoder */
        $encoder = Encoder::instance([
            User::class => UserSchema::class
        ], new EncoderOptions(JSON_PRETTY_PRINT, $this->prefixUrl));

        $json = $encoder->encodeData($user);
        return view('json', compact('json'));
    }

    /**
     * @param int $customerId
     * @return View
     */
    public function getCustomer (int $customerId): View
    {
        $customer = Customer::find($customerId);

        /** @var Encoder $encoder */
        $encoder = Encoder::instance([
            Customer::class => CustomerSchema::class
        ], new EncoderOptions(JSON_PRETTY_PRINT, $this->prefixUrl));

        $json = $encoder->encodeData($customer);
        return view('json', compact('json'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function loginUser (Request $request): View
    {
        $credentials = $request->all();
        $user = User::where('email', $credentials['email'])
            ->where('password', $credentials['password'])->first();


        /** @var Encoder $encoder */
        $encoder = Encoder::instance([
            User::class => UserSchema::class
        ], new EncoderOptions(JSON_PRETTY_PRINT, $this->prefixUrl));

        $json = $encoder->encodeData($user);
        if (!isset($user->id)) {
            $json = json_encode(Array('data' => Array('id' => 0)));
        }
        return view('json', compact('json'));

    }

    /**
     * @param Request $request
     * @return View
     */
    public function registerUser (Request $request): View
    {
        $credentials = $request->all();
        $user = User::where('email', $credentials['email'])
            ->first();

        if ((isset($user->id)) && $user->id > 0) {
            $json = json_encode(Array('data' => Array('id' => 0, 'message' => 'User already exists')));
        } else {
            $user = new User;
            $user->email = $credentials['email'];
            $user->password = $credentials['password'];
            $user->user_type_id = 1;
            $user->save();

            $customer = new Customer;
            $customer->balance = 0;
            $customer->user_id = $user->id;
            $customer->save();

            /** @var Encoder $encoder */
            $encoder = Encoder::instance([
                User::class => UserSchema::class
            ], new EncoderOptions(JSON_PRETTY_PRINT, $this->prefixUrl));

            $json = $encoder->encodeData($user);

        }
        return view('json', compact('json'));
    }

}