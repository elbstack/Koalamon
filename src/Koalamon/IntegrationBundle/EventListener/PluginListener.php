<?php

namespace Koalamon\IntegrationBundle\EventListener;

use Koalamon\DefaultBundle\EventListener\AdminMenuEvent;
use Koalamon\DefaultBundle\Menu\Element;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PluginListener
{
    private $router;

    public function __construct(ContainerInterface $container)
    {
        $this->router = $container->get('router');
    }

    public function onKoalamonPluginInit()
    {

    }

    public function onKoalamonPluginAdminMenuInit(AdminMenuEvent $event)
    {
        $menu = $event->getMenu();

        $project = $event->getProject();

        $menu->addElement(new Element($this->router->generate('koalamon_integration_home', ['project' => $project->getIdentifier()], true),
            'Integrations', 'menu_admin_integrations'));
    }
}