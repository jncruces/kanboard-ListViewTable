<?php if ($this->user->hasProjectAccess('ListViewTableController', 'show', $project['id'])): ?>
    <li>
        <?= $this->url->icon('table', t('List table'), 'ListViewTableController', 'show', array('project_id' => $project['id'], 'plugin' => 'ListViewTable')) ?>
    </li>
<?php endif ?>
