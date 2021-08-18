<?php

namespace App\Http\AuthWays;

interface AuthWaysContracts
{
    public function redirectToProvider();

    public function handleProviderCallback();
}
