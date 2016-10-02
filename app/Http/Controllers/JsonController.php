<?php
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 02.10.2016
 * Time: 2:20
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Schemas\CustomerSchema;
use App\Schemas\SchemaFactory;
use App\Schemas\UserSchema;

use Illuminate\Contracts\View\View;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;

class JsonController extends Controller
{
    protected $prefixUrl = "http://example.com/api/v1";

    /**
     * @param int $userId
     * @return View
     */
    public function getUser(int $userId): View
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
    function getCustomer(int $customerId): View
    {
        $customer = Customer::find($customerId);

        /** @var Encoder $encoder */
        $encoder = Encoder::instance([
            Customer::class => CustomerSchema::class
        ], new EncoderOptions(JSON_PRETTY_PRINT, $this->prefixUrl));

        $json = $encoder->encodeData($customer);
        return view('json', compact('json'));
    }
}