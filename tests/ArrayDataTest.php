<?php

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class ArrayDataTest extends TestCase implements Httpstatuscodes
{
    /**
     * #@dataProvider transformArrayValues
     * @test
     */
    public function transform_to_sub_by_key_test($expected, $actual) {
        $this->assertSame($expected, $actual);
    }

    public function transformArrayValues() {
        return [
            [
                [],
                \App\Api\Helpers\ArrayData::transformToSubByKey([], 'data', 'data')
            ],
            [
                [],
                \App\Api\Helpers\ArrayData::transformToSubByKey(['data' => ['some', 'data', 'here']], 'data', '')
            ],
            [
                [
                    [
                        'type' => 'data',
                        'data' => 'some',
                    ],
                    [
                        'type' => 'data',
                        'data' => 'data',
                    ],
                    [
                        'type' => 'data',
                        'data' => 'here',
                    ]
                ],
                \App\Api\Helpers\ArrayData::transformToSubByKey(['data' => ['some', 'data', 'here']], 'data', 'data')
            ],
            [
                [],
                \App\Api\Helpers\ArrayData::transformToSubByKey(['dataA' => ['myArray']], 'data', 'dataB')
            ],
            [
                [],
                \App\Api\Helpers\ArrayData::transformToSubByKey(['dataA' => 'bla'], 'data', 'dataA')
            ]
        ];
    }
}