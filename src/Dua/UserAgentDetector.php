<?php
namespace Dua;

use Symfony\Component\HttpFoundation\Request;

class UserAgentDetector implements UserAgentDetectorInterface
{
    protected $userAgents = array(
        'iPhone'    => 'iphone',
        'iPod'      => 'iphone',
        'iPad'      => 'nonmobile',
        'Android'   => 'iphone',
    );

    /**
     * detect
     *
     * @param  Symfony\Component\HttpFoundation\Request $request
     *
     * @return string
     */
    public function detect(Request $request)
    {
        // detect smartphones
        $ua = $request->server->get('HTTP_USER_AGENT');
        foreach ($this->userAgents as $key=>$value) {
            if (strpos($ua, $key) !== false) {

                return $value;
            }
        }

        return null;
    }
}

