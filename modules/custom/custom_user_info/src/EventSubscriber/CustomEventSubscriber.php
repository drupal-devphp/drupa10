<?php
namespace Drupal\custom_user_info\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CustomEventSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onNodeUpdate'];
    return $events;
  }

  public function onNodeUpdate(RequestEvent $event) {
    // Check if the updated entity is a node of type 'article'.
    $route_match = \Drupal::routeMatch();
    if ($node = $route_match->getParameter('node')) {
      if ($node->getType() == 'article' && $event->getRequest()->getMethod() == 'POST') {
        // Display a custom message.
        \Drupal::messenger()->addMessage('The article has been updated using event subsriber!');
      }
    }
  }
}