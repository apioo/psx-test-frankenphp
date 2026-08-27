<?php

namespace App\EventListener;

use PSX\Framework\Event\RequestIncomingEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DebugListener implements EventSubscriberInterface
{
    public function onRequestIncoming(RequestIncomingEvent $event): void
    {
        frankenphp_log('Incoming request', FRANKENPHP_LOG_LEVEL_ERROR, [
            'method' => $event->getRequest()->getMethod(),
            'uri' => $event->getRequest()->getUri(),
            'headers' => $event->getRequest()->getHeaders(),
        ]);
    }

    public static function getSubscribedEvents()
    {
        return [
            RequestIncomingEvent::class => 'onRequestIncoming',
        ];
    }
}

