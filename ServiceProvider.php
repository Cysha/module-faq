<?php namespace Cysha\Modules\Faq;

use Illuminate\Foundation\AliasLoader;
use Cysha\Modules\Core\BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        //$this->registerOtherPackages();
        $this->registerRepositories();
    }

    public function registerRepositories()
    {
        $this->app->bind(
            'Cysha\Modules\Faq\Repositories\Category\RepositoryInterface',
            'Cysha\Modules\Faq\Repositories\Category\DbRepository'
        );
    }


    private function registerOtherPackages()
    {
        $serviceProviders = [
        ];

        foreach ($serviceProviders as $sp) {
            $this->app->register($sp);
        }

        $aliases = [
        ];

        foreach ($aliases as $alias => $class) {
            AliasLoader::getInstance()->alias($alias, $class);
        }
    }

}
