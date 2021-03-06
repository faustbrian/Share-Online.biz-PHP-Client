<?php

declare(strict_types=1);

/*
 * This file is part of Share-Online.biz PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\ShareOnline;

use Plients\Http\Http;

class Client
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * Create a new client instance.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \Plients\ShareOnline\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri('http://www.share-online.biz/');

        $class = "Plients\\ShareOnline\\API\\{$name}";

        return new $class($client);
    }
}
