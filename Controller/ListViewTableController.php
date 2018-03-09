<?php

namespace Kanboard\Plugin\ListViewTable\Controller;

use Kanboard\Filter\TaskProjectFilter;
use Kanboard\Model\TaskModel;
use Kanboard\Controller\BaseController;

/**
 * Task List Controller
 *
 * @package  Kanboard\Controller
 * @author   Frederic Guillot
 */
class ListViewTableController extends BaseController
{
    /**
     * Show list view for projects
     *
     * @access public
     */
    public function show()
    {
        $project = $this->getProject();
        $search = $this->helper->projectHeader->getSearchQuery($project);
        $filter = $this->taskLexer->build($search)->withFilter(new TaskProjectFilter($project['id']));

        $paginator = $this->paginator
            ->setUrl('ListViewTableController', 'show', array('plugin' => 'ListViewTable', 'project_id' => $project['id']))
            ->setMax(30)
            ->setOrder(TaskModel::TABLE.'.id')
            ->setDirection('DESC')
            ->setQuery($this->taskLexer
                ->build($search)
                ->withFilter(new TaskProjectFilter($project['id']))
                ->getQuery()
            )
            ->calculate();

        $this->response->html($this->helper->layout->app('ListViewTable:task_list_table/show', array(
            'project' => $project,
            'title' => $project['name'],
            'description' => $this->helper->projectHeader->getDescription($project),
            'paginator' => $paginator,
        )));
    }
}
