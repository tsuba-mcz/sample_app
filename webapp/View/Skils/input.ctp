<?php $this->assign('title', $title); ?>
<div class="form_layout001">
	<h3><?= __('スキルシート作成'); ?></h3>
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create(false, ['type' => 'post', 'url' => '/skils/confirm', 'id' => 'skilForm']); ?>
		<ul class="mod_form_area clearfix">
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('社員番号'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<spna class="input_select">
						<?= $this->Form->select('Profile.user_id', $staffNo, ['label' => false, 'empty' => false]); ?>
					</spna>
				</span>
				<span class="form_explanatory_note">
					<?= __('該当の社員番号を選択してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('名前'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.profile_name', ['placeholder' => '名前']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('名前を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('フリガナ'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.phonetic', ['placeholder' => 'フリガナ']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('カタカナで入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('イニシャル'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.initial', ['placeholder' => '半角大文字もしくは半角スペース']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('名姓の順でイニシャルを入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('性別'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.gender', ['type' => 'radio', 'options' => ['0' => '男性', '1' => '女性'], 'div' => 'side_by_side', 'legend' => false, 'style' => 'float: none;']); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('性別を選択してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('生年月日'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<spna class="input_select">
						<?= $this->Form->select('Profile.birth_year', $yearList, ['label' => false, 'empty' => false]); ?>年&nbsp;
						<?= $this->Form->select('Profile.birth_month', $monthList, ['label' => false, 'empty' => false]); ?>月&nbsp;
						<?= $this->Form->select('Profile.birth_day', $dayList, ['label' => false, 'empty' => false]); ?>日
					</spna>
				</span>
				<span class="form_explanatory_note">
					<?= __('生年月日を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('簡易住所'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.simple_address'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('市区町村までの住所を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('詳細住所'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.detail_address'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('番地、ビル名等までの住所を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('最寄駅'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.near_station'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('最寄駅を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('出身校'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.school'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('出身校を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('学部'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.faculty'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('学部を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('学科'); ?>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.department'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('学科を入力してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column">
				<span class="form_item_name">
					<?= __('卒業年'); ?>
					<span class="form_required">
						<?= __('必須'); ?>
					</span>
				</span>
			</li>
			<li class="mod_form_right_column">
				<span class="form_input_area">
					<spna class="input_select error">
						<?= $this->Form->select('Profile.graduation_year', $yearList, ['label' => false, 'empty' => '--------']); ?>年
						<?= $this->Form->error('Profile.graduation_year'); ?>
					</spna>
				</span>
				<span class="form_explanatory_note">
					<?= __('卒業年を選択してください'); ?>
				</span>
			</li>
			<li class="mod_form_left_column textarea">
				<span class="form_item_name">
					<?= __('取得資格'); ?>
				</span>
			</li>
			<li class="mod_form_right_column textarea">
				<span class="form_input_area">
					<?= $this->Form->input('Profile.license'); ?>
				</span>
				<span class="form_explanatory_note">
					<?= __('取得資格を入力してください'); ?>
				</span>
			</li>
		</ul>
		<div class="button_area">
			<a class="submit_btn"><?= __('内容確認') ?></a>
		</div>
	<?php $this->Form->end(); ?>
</div>
<script type="text/javascript">
	$('.submit_btn').on('click', function() {
		$('#skilForm').submit();
	});
</script>