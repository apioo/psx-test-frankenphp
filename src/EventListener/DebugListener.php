<?php

namespace App\EventListener;

use PSX\Framework\Event\RequestIncomingEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DebugListener implements EventSubscriberInterface
{
    public function onRequestIncoming(RequestIncomingEvent $event): void
    {
        echo 'Incoming request' . PHP_EOL;
        echo 'Method: ' . $event->getRequest()->getMethod() . PHP_EOL;
        echo 'URI: ' . $event->getRequest()->getUri() . PHP_EOL;
        echo 'Headers: ' . var_export($event->getRequest()->getHeaders(), true) . PHP_EOL;
    }

    public static function getSubscribedEvents()
    {
        return [
            RequestIncomingEvent::class => 'onRequestIncoming',
        ];
    }
}

