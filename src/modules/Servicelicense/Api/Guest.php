<?php
/**
 * Copyright 2022-2023 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

namespace Box\Mod\Servicelicense\Api;

/**
 * Licensing server.
 */
class Guest extends \Api_Abstract
{
    /**
     * Check license details callback. Request IP is detected automatically
     * You can pass any other parameters to be validated by license plugin.
     *
     * @param string $license - license key
     * @param string $host    - hostname where license is installed
     * @param string $version - software version
     * @param string $path    - software install path
     *
     * @optional string $legacy - deprecated parameter. Returns result in non consistent API result
     *
     * @return array - bool
     */
    public function check($data)
    {
        return $this->getService()->checkLicenseDetails($data);
    }
}
