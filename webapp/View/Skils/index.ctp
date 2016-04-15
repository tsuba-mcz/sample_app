<?php $this->assign('title', $title); ?>
<div class="table_layout001">
    <div class="button_area">
        <a href="skils/input" class="button">新規スキルシート登録</a>
    </div>
    <table class="mod_table">
        <thead>
            <tr class="header_title_area">
                <th>id</th>
                <th>社員番号</th>
                <th>名前</th>
                <th>フリガナ</th>
                <th>最終更新日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($profiles as $profile) { ?>
                <tr class="content_area">
                    <td><?= $profile['Profile']['id']; ?></td>
                    <td><?= $profile['User']['staff_no']; ?></td>
                    <td><?= $profile['Profile']['profile_name']; ?></td>
                    <td><?= $profile['Profile']['phonetic']; ?></td>
                    <td><?= $profile['Profile']['updated']; ?></td>
                    <td>
                        <a href="skils/edit/<?= $profile['Profile']['id']; ?>">編集</a>&nbsp;
                        <a href="skils/delete/<?= $profile['Profile']['id']; ?>" class="delete">削除</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('.delete').on('click', function() {
        var name = $(event.target).parents().children('td').eq(2).text();
        if(window.confirm(name + 'さんを削除します。よろしいですか？')) {
            return true;
        } else {
            return false;
        }
    });
</script>