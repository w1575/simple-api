<?php

namespace App\Contracts\Api\Equipment;

use App\Data\Equipment\ShowData;

interface ShowContractInterface
{
    public function __invoke(ShowData $data);
}
