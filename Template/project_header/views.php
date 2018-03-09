<?php if ($this->user->hasProjectAccess('ListViewTableController', 'show', $project['id'])): ?>
<li <?= $this->app->checkMenuSelection('ListViewTableController') ?>>
<?= $this->url->icon('table', t('List table'), 'ListViewTableController', 'show', array('project_id' => $project['id'], 'search' => $filters['search'], 'plugin' => 'ListViewTable'), false, 'view-list-table', t('Keyboard shortcut: "%s"', 'v t')) ?>
</li>
<?php endif ?>
