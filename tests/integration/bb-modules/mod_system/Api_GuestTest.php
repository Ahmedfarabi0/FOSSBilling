<?php
/**
 * Copyright 2022-2023 FOSSBilling
 * Copyright 2011-2021 BoxBilling, Inc.
 * SPDX-License-Identifier: Apache-2.0
 *
 * @copyright FOSSBilling (https://www.fossbilling.org)
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */

/**
 * @group Core
 */
class Api_Guest_SystemTest extends BBDbApiTestCase
{
    protected $_initialSeedFile = 'settings.xml';

    public function testPhoneCodes()
    {
        $array = $this->api_guest->system_phone_codes();
        $this->assertIsArray($array);

        $str = $this->api_guest->system_phone_codes(['country' => 'US']);
        $this->assertEquals('1', $str);

        foreach ($this->api_guest->system_countries() as $code => $name) {
            $this->api_guest->system_phone_codes(['country' => $code]);
        }
    }

    public function testCompany()
    {
        $array = $this->api_guest->system_countries();
        $this->assertIsArray($array);

        $array = $this->api_guest->system_countries_eunion();
        $this->assertIsArray($array);

        $array = $this->api_guest->system_states();
        $this->assertIsArray($array);

        $array = $this->api_guest->system_company();
        $this->assertIsArray($array);
    }

    public function testFiles()
    {
        $bool = $this->api_guest->system_template_exists();
        $this->assertFalse($bool);

        $bool = $this->api_guest->system_template_exists(['file' => 'non_existing_template.html.twig']);
        $this->assertFalse($bool);

        $bool = $this->api_guest->system_template_exists(['file' => 'mod_index_dashboard.html.twig']);
        $this->assertTrue($bool);
    }

    public function testSystem()
    {
        $string = $this->api_guest->system_version();
        $this->assertIsString($string);

        $array = $this->api_guest->system_company();
        $this->assertIsArray($array);

        $string = $this->api_guest->system_param(['key' => 'phpunit']);
        $this->assertIsString($string);

        $array = $this->api_guest->system_countries();
        $this->assertIsArray($array);

        $array = $this->api_guest->system_periods();
        $this->assertIsArray($array);

        $string = $this->api_guest->system_locale();
        $this->assertIsString($string);
    }
}
