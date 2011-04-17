<?php
namespace Dua\Adapter;

use Symfony\Component\HttpFoundation\Request;
use Dua\UserAgentDetector;

/**
 * NetUserAgentMobileAdapter
 */
class NetUserAgentMobileAdapter extends UserAgentDetector
{
    public function __construct()
    {
    }

    /**
     * detect
     *
     * @param  Symfony\Component\HttpFoundation\Request $request
     *
     * @return string  The type name of the user agent (ex. 'docomo')
     */
    public function detect(Request $request)
    {
        $ua = parent::detect($request);

        if (!$ua) {
            $mobile = \Net_UserAgent_Mobile::factory($request->server->get('HTTP_USER_AGENT'));
            $ua = strtolower($mobile->getCarrierlongName());
        }

        return $ua;
    }
}
