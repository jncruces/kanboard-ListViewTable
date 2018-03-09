<?php

namespace Kanboard\Plugin\ListViewTable\Formatter;

use Kanboard\Core\Filter\FormatterInterface;
use Kanboard\Formatter\BaseFormatter;


/**
 * Class ProjectApiFormatter
 *
 * @package Kanboard\Formatter
 */
class ListViewTableFormatter extends BaseFormatter implements FormatterInterface
{
    protected $project = null;

    public function withProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * Apply formatter
     *
     * @access public
     * @return mixed
     */
    public function format()
    {
        if (! empty($this->project)) {
            $this->project['url'] = array(
                'listtable' => $this->helper->url->to('ListViewTableController', 'show', array('project_id' => $this->project['id'], 'plugin' => 'ListViewTable')),
            );
        }

        return $this->project;
    }
}
