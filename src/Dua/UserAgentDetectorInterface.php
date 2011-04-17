<?php
namespace Dua;

use Symfony\Component\HttpFoundation\Request;

interface UserAgentDetectorInterface
{
    /**
     * detect
     *
     * @param  Symfony\Component\HttpFoundation\Request $request
     *
     * @return string
     */
    public function detect(Request $request);
}

