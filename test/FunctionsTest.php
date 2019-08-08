<?php

require '../functions.php';

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{

    /***
     * processData success test
     */

   public function testProcessData_returnsAString_success() {

       $testArray = [
           [
               'id' => 1,
               'common_name' => 'American Persimmon',
               'latin_name' => 'Diospyros virginiana',
               'canopy_level' => 'CANOPY LAYER',
               'life_span' => 60
           ],
           [
               'id' => 2,
               'common_name' => 'Nodding Saltbush',
               'latin_name' => 'Einadia wutans',
               'canopy_level' => 'SHRUB LAYER',
               'life_span' => 10
           ]
       ];

       $expectedResult =  '<div class="row"><ul><li>1</li><li>American Persimmon</li><li>Diospyros virginiana</li><li>CANOPY LAYER</li><li>60</li></ul></div><div class="row"><ul><li>2</li><li>Nodding Saltbush</li><li>Einadia wutans</li><li>SHRUB LAYER</li><li>10</li></ul></div>';

       $result = processData($testArray);

       $this->assertEquals($expectedResult, $result);
   }

    /***
     * processData malformed test
     */

    public function testProcessData_MalformedInput() {

        $testArray = [
            'id' => 1,
            'common_name' => 'American Persimmon',
            'latin_name' => 'Diospyros virginiana',
            'canopy_level' => 'CANOPY LAYER',
            'life_span' => 60
        ];

        $expectedResult =  false;

        $result = processData($testArray);

        $this->assertEquals($expectedResult, $result);
    }

    /***
     * displayID success test
     */

    public function testDisplayID_returnsAString_success() {

       $testArray = [['id' => 1], ['id' => 2], ['id' => 3]];

       $expectedResult = '<p>1</p><p>2</p><p>3</p>';

       $result = displayID($testArray);

        $this->assertEquals($expectedResult, $result);
    }

    /***
     * displayID malformed test
     */

    public function testDisplayID_MalformedInput() {

        $testArray =  ['id' => 1, 'common_name' => 'bleh', 'latin_name' => 'Diospyros virginiana'];

        $expectedResult =  false;

        $result = processData($testArray);

        $this->assertEquals($expectedResult, $result);
    }

    /***
     * displayImage success test
     */

    public function testDisplayImage_returnsAString_success() {

        $testArray = [
            ['identification_image' => './images/american-persimmon.jpg'],
            ['identification_image' => './images/nodding-saltbush.jpg'],
            ['identification_image' => './images/chinese-chestnut.jpg']
        ];

        $expectedResult = '<div><img class ="sourceImage" src="./images/american-persimmon.jpg"></div><div><img class ="sourceImage" src="./images/nodding-saltbush.jpg"></div><div><img class ="sourceImage" src="./images/chinese-chestnut.jpg"></div>';

        $result = displayImage($testArray);

        $this->assertEquals($expectedResult, $result);
    }



    public function testDisplayImage_MalformedTest() {

        $testArray = [
            'identification_image' => './images/american-persimmon.jpg',
            'id' => 5,
            'latin_name' => 'Diospyros virginiana'
        ];

        $expectedResult = false;

        $result = displayImage($testArray);

        $this->assertEquals($expectedResult, $result);
    }
}