<?php if ($this->user->hasAccess('ListViewTableController', 'show')): ?>
    <li><?= $this->url->icon('table', t('List table'), 'ListViewTableController', 'show', array('plugin' => 'ListViewTable')) ?></li>
<?php endif ?>
