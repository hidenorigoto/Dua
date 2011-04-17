<?php

namespace Dua\Test;

use Symfony\Component\httpFoundation\Request;
use Dua\UserAgentDetector as Detector;

class UserAgentDetectorTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
    }

    public function testShouldDetectNonmobile()
    {
        $server = array(
            'HTTP_USER_AGENT' => 'Test',
        );
        $request = new Request();
        $request->initialize(array(), array(), array(), array(), array(), $server);
        $mobile = new Detector();
        $result = $mobile->detect($request);
        $this->assertEquals($result, null, '->detect() returns null');
    }

    public function testShouldDetectIphone()
    {
        $server = array(
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 2_0 like Mac OS X; en-us) AppleWebKit/525.18.1 (KHTML, like Gecko) Version/3.1.1 Mobile/XXXXX Safari/525.20',
        );
        $request = new Request();
        $request->initialize(array(), array(), array(), array(), array(), $server);
        $mobile = new Detector();
        $result = $mobile->detect($request);
        $this->assertEquals($result, 'iphone', '->detect() returns iphone');
    }

    public function testShouldDetectAndroid()
    {
        $server = array(
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; U; Android 2.1-update1; ja-jp; HTCX06HT Build/ERE27) AppleWebKit/530.17 (KHTML, like Gecko) Version/4.0 Mobile Safari/530.17',
        );
        $request = new Request();
        $request->initialize(array(), array(), array(), array(), array(), $server);
        $mobile = new Detector();
        $result = $mobile->detect($request);
        $this->assertEquals($result, 'iphone', '->detect() returns iphone');
    }
}

