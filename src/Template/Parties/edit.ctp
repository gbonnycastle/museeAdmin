<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $party->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $party->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parties'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="parties form large-9 medium-8 columns content">
    <?= $this->Form->create($party) ?>
    <fieldset>
        <legend><?= __('Edit Party') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('org');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
