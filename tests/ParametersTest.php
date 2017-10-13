<?php

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class ParametersTest extends TestCase implements Httpstatuscodes
{
    /**
     * @test
     */
    public function extract_base_filters_always_returns_basic_format() {
        $expected = [
            'query' => []
        ];

        $this->assertEquals($expected, \App\Api\Helpers\Parameters::extractBaseFilters($this->request));
    }
}