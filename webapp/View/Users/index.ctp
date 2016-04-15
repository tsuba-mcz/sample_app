<?php $this->assign('title', $title); ?>
<div class="table_layout001">
    <div class="button_area">
        <a href="users/add" class="button">新規ユーザー追加</a>
    </div>
    <table class="mod_table">
        <thead>
            <tr class="header_title_area">
                <th>id</th>
                <th>社員番号</th>
                <th>名前</th>
                <th>読み仮名</th>
                <th>メールアドレス</th>
                <th>管理者権限</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user) { ?>
                <tr class="content_area">
                    <td><?= $user['User']['id']; ?></td>
                    <td><?= $user['User']['staff_no']; ?></td>
                    <td><?= $user['User']['fname']; ?>&nbsp;<?= $user['User']['lname']; ?></td>
                    <td><?= $user['User']['fkana']; ?>&nbsp;<?= $user['User']['lkana']; ?></td>
                    <td><?= $user['User']['email']; ?></td>
                    <td>
                        <?php if($user['User']['manager']) {
                            echo __('有');
                        } else {
                            echo __('無');
                        } ?>
                    </td>
                    <td>
                        <a href="users/edit/<?= $user['User']['id']; ?>">編集</a>&nbsp;
                        <?php if($auth['manager']) { ?>
                            <a href="users/delete/<?= $user['User']['id']; ?>" class="delete">削除</a>
                        <?php } ?>
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