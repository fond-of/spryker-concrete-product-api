<?php

namespace FondOfSpryker\Zed\ConcreteProductApi;

use FondOfSpryker\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToProductFacadeBridge;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerBridge;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryContainerBridge;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ConcreteProductApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SERVICE_DATE_FORMATTER = 'SERVICE_DATE_FORMATTER';

    public const QUERY_CONTAINER_API = 'QUERY_CONTAINER_API';
    public const QUERY_CONTAINER_API_QUERY_BUILDER = 'QUERY_CONTAINER_API_QUERY_BUILDER';

    public const FACADE_PRODUCT = 'FACADE_PRODUCT';
    public const PROPEL_QUERY_PRODUCT = 'PROPEL_QUERY_PRODUCT';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addApiQueryContainer($container);
        $container = $this->addApiQueryBuilderQueryContainer($container);
        $container = $this->addProductFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $container = $this->addApiQueryContainer($container);
        $container = $this->addApiQueryBuilderQueryContainer($container);
        $container = $this->addProductPropelQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addApiQueryContainer(Container $container): Container
    {
        $container[static::QUERY_CONTAINER_API] = static function (Container $container) {
            return new ConcreteProductApiToApiQueryContainerBridge(
                $container->getLocator()->api()->queryContainer()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addApiQueryBuilderQueryContainer(Container $container): Container
    {
        $container[static::QUERY_CONTAINER_API_QUERY_BUILDER] = static function (Container $container) {
            return new ConcreteProductApiToApiQueryBuilderQueryContainerBridge(
                $container->getLocator()->apiQueryBuilder()->queryContainer()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductFacade(Container $container): Container
    {
        $container[static::FACADE_PRODUCT] = static function (Container $container) {
            return new ConcreteProductApiToProductFacadeBridge($container->getLocator()->product()->facade());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_PRODUCT] = static function () {
            return SpyProductQuery::create();
        };

        return $container;
    }
}
