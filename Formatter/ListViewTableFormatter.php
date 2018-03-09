<?php

namespace Kanboard\Plugin\ListViewTable\Formatter;

use Kanboard\Core\Filter\FormatterInterface;
use Kanboard\Formatter\ProjectApiFormatter;


/**
 * Class ProjectApiFormatter
 *
 * @package Kanboard\Plugin\Calendar\Formatter
 */
class ListViewTableFormatter extends ProjectApiFormatter
{
    public function format()
    {
        $project = parent::format();

        if (! empty($project)) {
            $project['url']['listtable'] = $this->helper->url->to('ListViewTableController', 'show', array('project_id' => $project['id'], 'plugin' => 'ListViewTable'), '', true);
        }

        return $project;
    }
}
