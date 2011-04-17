<?php

namespace Dua\Test\Adapter;

use Symfony\Component\httpFoundation\Request;
use Dua\Adapter\NetUserAgentMobileAdapter as Detector;

class NetUserAgentMobileAdapterTest extends \PHPUnit_Framework_TestCase
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
        $this->assertEquals($result, 'nonmobile', '->detect() returns nonmobile');
    }

    public function testShouldDetectDocomo()
    {
        $server = array(
            'HTTP_USER_AGENT' => 'DoCoMo/1.0/D501i',
        );
        $request = new Request();
        $request->initialize(array(), array(), array(), array(), array(), $server);
        $mobile = new Detector();
        $result = $mobile->detect($request);
        $this->assertEquals($result, 'docomo', '->detect() returns docomo');
    }

    public function testShouldDetectSoftbank()
    {
        $server = array(
            'HTTP_USER_AGENT' => 'SoftBank/1.0/810P/PJP10/SN123456789012345 Browser/NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1',
        );
        $request = new Request();
        $request->initialize(array(), array(), array(), array(), array(), $server);
        $mobile = new Detector();
        $result = $mobile->detect($request);
        $this->assertEquals($result, 'softbank', '->detect() returns softbank');
    }

    public function testShouldDetectEzweb()
    {
        $server = array(
            'HTTP_USER_AGENT' => 'KDDI-CA23 UP.Browser/6.2.0.3.111 (GUI) MMP/2.0',
        );
        $request = new Request();
        $request->initialize(array(), array(), array(), array(), array(), $server);
        $mobile = new Detector();
        $result = $mobile->detect($request);
        $this->assertEquals($result, 'ezweb', '->detect() returns ezweb');
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

