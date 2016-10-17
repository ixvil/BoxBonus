<?php declare(strict_types = 1);

namespace App\Http\Middleware;

use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{

    /**
     * VerifyCsrfToken constructor.
     * @param Application $app
     * @param Encrypter $encrypter
     */
    public function __construct (Application $app, Encrypter $encrypter)
    {
        parent::__construct($app, $encrypter);

        /**
         * The URIs that should be excluded from CSRF verification.
         *
         * @$this->except Array
         */

        $this->except = ['/json/login/'];
    }


}
