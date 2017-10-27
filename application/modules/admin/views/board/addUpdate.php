
<form action="<?=my_site_url(admin_board_uri."/$mode")?>" method="post">
    게시판이름<input type="text" name="name" value="<?=set_value_data($board,'name')?>"> <?=form_error('name',false,false)?><br> 
    <select name="skin" id="">
    <?php for($i=0; $i < count($skins);$i++){?>
        <option value="<?=$skins[$i]?>" <?=my_set_selected($board,'skin',$skins[$i])?>><?=$skins[$i]?></option>
    <?php }?>
    </select>
    <!-- 종류<input type="text" name="kind" value="<?=set_value_data($board,'kind')?>"><?=form_error('kind',false,false)?><br> -->
    게시판볼권한<input type="text" name="auth_r_board" value="<?=set_value_data($board,'auth_r_board')?>"><?=form_error('auth_r_board',false,false)?><br>
    글쓰기권한<input type="text" name="auth_w_content" value="<?=set_value_data($board,'auth_w_content')?>"><?=form_error('auth_w_content',false,false)?><br>
    글읽기권한<input type="text" name="auth_r_content" value="<?=set_value_data($board,'auth_r_content')?>"><?=form_error('auth_r_content',false,false)?><br>
    댓글쓰기권한<input type="text" name="auth_w_review" value="<?=set_value_data($board,'auth_w_review')?>"><?=form_error('auth_w_review',false,false)?><br>
    <!-- <input type="checkbox" name="is_linked_with_product" value="1" <?=my_set_checked($board,'is_linked_with_product','1')?>> 상품과 연동<br> -->

<input type="submit" value="보내기">
</form>

