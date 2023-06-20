<?php

namespace Container1jzXs0H;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSignInFormTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Form\SignInFormType' shared autowired service.
     *
     * @return \App\Form\SignInFormType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/SignInFormType.php';

        return $container->privates['App\\Form\\SignInFormType'] = new \App\Form\SignInFormType();
    }
}
