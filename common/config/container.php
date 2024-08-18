<?php

declare(strict_types=1);

use common\infrastructure\components\Tbank\TbankComponentInterface;
use common\infrastructure\components\Tbank\TbankDummyComponent;

return [
    'definitions' => [
        TbankComponentInterface::class => TbankDummyComponent::class,
       // TbankComponentInterface::class => TbankComponent::class,
        // or
//        'tbank.component.real' => TbankComponent::class,
//        'tbank.component.dummy' => TbankDummyComponent::class,
//        TbankComponentInterface::class => Instance::of('tbank.component.dummy'),
    ],
    'singletons' => [],
];