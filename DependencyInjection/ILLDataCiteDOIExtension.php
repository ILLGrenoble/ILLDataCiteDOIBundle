<?php

namespace ILL\DataCiteDOIBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;
/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ILLDataCiteDOIExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $validator = new Reference('validator');
        $container->getDefinition("ill_data_cite_doi.manager")->addArgument($config);
        $container->getDefinition("ill_data_cite_doi.manager")->addArgument($validator);
        $container->getDefinition("ill_data_cite_doi.metadata_manager")->addArgument($config);
        $container->getDefinition("ill_data_cite_doi.metadata_manager")->addArgument($validator);
    }
}
