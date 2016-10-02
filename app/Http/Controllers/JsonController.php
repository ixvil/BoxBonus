<?php
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 02.10.2016
 * Time: 2:20
 */

namespace App\Http\Controllers;

use App\Models\User;
use App\Schemas\SchemaFactory;
use App\Schemas\UserSchema;

use Illuminate\Contracts\View\View;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;

class JsonController extends Controller
{


    /**
     * @param int $userId
     * @return View
     */
    public function getUser(int $userId): View
    {
        $user = User::find($userId);

        $encoder = Encoder::instance([
            User::class => UserSchema::class
        ], new EncoderOptions(JSON_PRETTY_PRINT, 'http://example.com/api/v1'));

        $json = $encoder->encodeData($user);


        return view('json', compact('json'));
    }
}