<?php

namespace ConstantContactIntegration;

use Contao\System;

class EventListener extends System
{
    public function refreshToken(): void
    {
       
        // Testing the controller log
        \Controller::log('CCI: Attempting token refresh', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');

        // Do stuffs here

         // Testing the controller log
        //\Controller::log('CCI: Token refreshed - ' . $tokenVariable . '.', __CLASS__ . '::' . __FUNCTION__, 'GENERAL');
    }
}
