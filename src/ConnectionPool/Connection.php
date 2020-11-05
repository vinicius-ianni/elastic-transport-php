<?php
/**
* Elastic Transport
 *
 * @link      https://github.com/elastic/elastic-transport-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types=1);

namespace Elastic\Transport\ConnectionPool;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class Connection
{
    protected Uri $uri;
    protected bool $alive = true;

    public function __construct(Uri $uri)
    {
        $this->uri = $uri;
    }

    public function markAlive(bool $alive)
    {
        $this->alive = true;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function getPort(): int
    {
        return $this->uri->getPort();
    }

    public function getUrl(): string
    {
        return $this->uri->getPath();
    }

    public function setUri(Uri $uri)
    {
        $this->uri = $uri;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }
}