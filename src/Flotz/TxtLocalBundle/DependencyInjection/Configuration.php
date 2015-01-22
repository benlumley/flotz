<?php

namespace Flotz\TxtLocalBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('flotz');

        $rootNode->children()
            ->arrayNode('txtlocal')
                ->children()
                    ->scalarNode('username')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->scalarNode('hash')
                        ->isRequired()
                        ->cannotBeEmpty()
                    ->end()
                    ->scalarNode('apiKey')
                        ->defaultFalse()
                    ->end()
                    ->scalarNode('test')
                        ->defaultFalse()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
