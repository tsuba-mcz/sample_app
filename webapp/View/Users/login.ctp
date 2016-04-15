<?= $this->Session->flash(); ?>
<?= $this->Form->create('User'); ?>
<?= $this->Form->input('email'); ?>
<?= $this->Form->input('password'); ?>
<?= $this->Form->button(__('ログイン')); ?>
<?= $this->Form->end(); ?>