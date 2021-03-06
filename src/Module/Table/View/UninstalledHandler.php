<?php namespace Anomaly\AddonsModule\Module\Table\View;

use Anomaly\AddonsModule\Module\Table\ModuleTableBuilder;
use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;

/**
 * Class UninstalledHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\AddonsModule\Module\Table\View
 */
class UninstalledHandler
{

    /**
     * Handle the view.
     *
     * @param ModuleTableBuilder $builder
     * @param ModuleCollection   $modules
     */
    public function handle(ModuleTableBuilder $builder, ModuleCollection $modules)
    {
        $builder->setTableEntries($modules->uninstalled());
    }
}
