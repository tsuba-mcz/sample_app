<?php $this->assign('title', $title); ?>
<div class="form_layout001">
	<h3><?= __('入力内容確認'); ?></h3>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create(false, ['type' => 'post', 'url' => '/skils/editComplete/' . $data['Profile']['id'], 'id' => 'skilEditForm']); ?>
	<?= $this->Form->hidden('Profile.id', ['value' => $data['Profile']['id']]); ?>
		<ul class="mod_form_area clearfix">
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('社員番号'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
						<?= $userId; ?>
						<?= $this->Form->hidden('Profile.user_id', ['value' => $data['Profile']['user_id']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('名前'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['profile_name']; ?>
					<?= $this->Form->hidden('Profile.profile_name', ['value' => $data['Profile']['profile_name']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('フリガナ'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['phonetic']; ?>
					<?= $this->Form->hidden('Profile.phonetic', ['value' => $data['Profile']['phonetic']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('イニシャル'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['initial']; ?>
					<?= $this->Form->hidden('Profile.initial', ['value' => $data['Profile']['initial']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('性別'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?php if($data['Profile']['gender']) {
						echo __('女性');
					} else {
						echo __('男性');
					} ?>
					<?= $this->Form->hidden('Profile.gender', ['value' => $data['Profile']['gender']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('生年月日'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
						<?= $data['Profile']['birth_year']; ?>年
						<?= $data['Profile']['birth_month']; ?>月
						<?= $data['Profile']['birth_day']; ?>日
						<?= $this->Form->hidden('Profile.birth_year', ['value' => $data['Profile']['birth_year']]); ?>
						<?= $this->Form->hidden('Profile.birth_month', ['value' => $data['Profile']['birth_month']]); ?>
						<?= $this->Form->hidden('Profile.birth_day', ['value' => $data['Profile']['birth_day']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('簡易住所'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['simple_address']; ?>
					<?= $this->Form->hidden('Profile.simple_address', ['value' => $data['Profile']['simple_address']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('詳細住所'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['detail_address']; ?>
					<?= $this->Form->hidden('Profile.detail_address', ['value' => $data['Profile']['detail_address']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('最寄駅'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['near_station']; ?>
					<?= $this->Form->hidden('Profile.near_station', ['value' => $data['Profile']['near_station']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('出身校'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['school']; ?>
					<?= $this->Form->hidden('Profile.school', ['value' => $data['Profile']['school']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('学部'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['faculty']; ?>
					<?= $this->Form->hidden('Profile.faculty', ['value' => $data['Profile']['faculty']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('学科'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['department']; ?>
					<?= $this->Form->hidden('Profile.department', ['value' => $data['Profile']['department']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('卒業年'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
						<?= $data['Profile']['graduation_year']; ?>年
						<?= $this->Form->hidden('Profile.graduation_year', ['value' => $data['Profile']['graduation_year']]); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('取得資格'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_confirm_area">
					<?= $data['Profile']['license']; ?>
					<?= $this->Form->hidden('Profile.license', ['value' => $data['Profile']['license']]); ?>
				</span>
			</li>
		</ul>
		<div class="button_area">
			<a class="submit_back_btn"><?= __('戻る') ?></a>
			<a class="submit_btn"><?= __('登録') ?></a>
		</div>
	<?php $this->Form->end(); ?>
</div>
<script type="text/javascript">
	$('.submit_back_btn').on('click', function() {
		$('#skilEditForm').attr('action', '/sample_app/webapp/skils/edit/<?= $data['Profile']['id']; ?>');
		$('#skilEditForm').submit();
	});
	$('.submit_btn').on('click', function() {
		$('#skilEditForm').submit();
	});
</script>