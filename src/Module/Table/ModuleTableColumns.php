<?php namespace Anomaly\AddonsModule\Module\Table;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class ModuleTableColumns
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\AddonsModule\Module\Table
 */
class ModuleTableColumns
{

    /**
     * Return the table columns.
     **/
    public function handle(ModuleTableBuilder $builder)
    {
        $builder->setColumns(
            [
                [
                    'heading' => 'streams::addon.module',
                    'value'   => function (Module $entry) {
                        return trans($entry->getName());
                    },
                ],
                [
                    'heading' => 'module::admin.description',
                    'value'   => function (Module $entry) {
                        return trans($entry->getDescription());
                    }
                ],
                [
                    'heading' => 'module::admin.installed',
                    'value'   => function (Module $entry) {

                        if ($entry->isInstalled()) {
                            $class = 'success';
                            $text  = trans('module::admin.installed');
                        } else {
                            $class = 'default';
                            $text  = trans('module::admin.uninstalled');
                        }

                        return '<span class="label label-' . $class . '">' . $text . '</span>';
                    }
                ],
                [
                    'heading' => 'module::admin.location',
                    'value'   => function (Module $entry) {

                        $class = 'warning';
                        $text  = APP_REF;

                        if ($entry->isCore()) {
                            $class = 'danger';
                            $text  = trans('module::admin.core');
                        }

                        if ($entry->isShared()) {
                            $class = 'info';
                            $text  = trans('module::admin.shared');
                        }

                        return '<span class="label label-' . $class . '">' . $text . '</span>';
                    }
                ]
            ]
        );
    }
}
