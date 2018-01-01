<table class="ui selectable table">
    <tr>
        <td>번호</td>
        <td>아이디</td>
        <td>이름</td>
        <td>종류</td>
        <td>가입일</td>
    </tr>
    <?php foreach ( $users as $user ): ?>
        <tr>
            <td>
                <?=$user->id?>
            </td>
            <td>
                <a href="<?=my_site_url(admin_user_uri."/update/{$user->id}/$kind")?>">
                    <?=$user->userName?>
                </a>
            </td>
            <td>
                <a href="<?=my_site_url(admin_user_uri."/update/{$user->id}/$kind")?>">
                    <?=$user->name?>
                </a>
            </td>
            <td>
                <a href="<?=my_site_url(admin_user_uri."/update/{$user->id}/$kind")?>">
                    <?=$user->kind?>
                </a>
            </td>
            <td>
                <?=$user->created?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>



<form action="<?=my_site_url(admin_user_uri."/gets")?>" method="post">
    <select name="field" id="">
        <option value="userName" <?=my_set_selected('field','userName','POST')?>>회원아이디</option>
        <option value="name" <?=my_set_selected('field','name','POST')?>>회원이름</option>
    </select>
    <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
    <input type="submit" value="검색">
</form>

<a class="ui button" style="margin-top:10px;"href="<?=my_site_url(admin_user_uri."/add/$kind")?>">추가</a>
<div class="ui centered grid container">
    <div class="row">
        <?= $this->pagination->create_links();?>

    </div>
</div>