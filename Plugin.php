<?php

namespace Kanboard\Plugin\ListViewTable;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
use Kanboard\Core\Translator;
// use Kanboard\Plugin\ListViewTable\Formatter\ListViewTableFormatter;

class Plugin extends Base
{
    public function initialize()
    {
      $this->applicationAccessMap->add('ListViewTableController', '*', Role::APP_MANAGER);
      $this->route->addRoute('listtable/:project_id', 'ListViewTableController', 'show', 'plugin');

      $this->template->hook->attach('template:project-header:view-switcher', 'ListViewTable:project_header/views');
      $this->template->hook->attach('template:project:dropdown', 'ListViewTable:project/dropdown');
      $this->template->hook->attach('template:project-list:menu:after', 'ListViewTable:project_list/menu');

      // $this->container['listViewTableFormatter'] = $this->container->factory(function ($c) {
      //     return new ListViewTableFormatter($c);
      // });

    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'ListViewTable';
    }

    public function getPluginDescription()
    {
        return t('List Table');
    }

    public function getPluginAuthor()
    {
        return 'Juan Natera Cruces';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return '';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.43';
    }
}
