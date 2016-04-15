<?php $this->assign('title', $title); ?>
<div class="form_layout001">
	<h3><?= __('ユーザー編集'); ?></h3>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('User', ['type' => 'post']); ?>
	<?php echo $this->Form->input('id', ['type' => 'hidden']); ?>
		<ul class="mod_form_area clearfix">
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('社員番号'); ?>
				</span>
				<span class="form_required">
					<?= __('必須'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('staff_no', ['placeholder' => '半角数字']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('5桁の社員番号を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('名前'); ?>
				</span>
				<span class="form_required">
					<?= __('必須'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area width_50">
					<?= $this->Form->input('fname', ['placeholder' => '姓']); ?>
				</span>
				<span class="form_input_area width_50">
					<?= $this->Form->input('lname', ['placeholder' => '名']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('名前を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('フリガナ'); ?>
				</span>
				<span class="form_required">
					<?= __('必須'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area width_50">
					<?= $this->Form->input('fkana', ['placeholder' => 'セイ']); ?>
				</span>
				<span class="form_input_area width_50">
					<?= $this->Form->input('lkana', ['placeholder' => 'メイ']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('カタカナで入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('メールアドレス'); ?>
				</span>
				<span class="form_required">
					<?= __('必須'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('email'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('ここで登録されるメールアドレスはログインIDとして使用します'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('管理者権限'); ?>
				</span>
				<span class="form_required">
					<?= __('必須'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
				<?= $this->Form->input('manager', ['type' => 'radio', 'options' => ['0' => '付与しない', '1' => '付与する'], 'div' => 'side_by_side', 'legend' => false, 'style' => 'float: none;']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('管理者権限を設定してください'); ?>
				</span>
			</li>
		</ul>
		<div class="button_area">
			<a class="submit_btn"><?= __('保存') ?></a>
		</div>
	<?php $this->Form->end(); ?>
</div>
<script type="text/javascript">
	$('.submit_btn').on('click', function() {
		$('#UserEditForm').submit();
	});
</script>