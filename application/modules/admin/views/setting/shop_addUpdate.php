




<div class="sixteen wide column" style="margin-top:50px;">
    
<h1 class="ui horizontal divider header">
<i class="plus icon"></i>
    기본설정
    </h1>
    <!-- <label>상품 후기 자동 보이기</label> -->
    <form class="ui form"onsubmit="ajax_submit(this);return false;"action="<?=my_site_url(admin_setting_product_uri."/ajax_update_product")?>" method="post">
        <div class="grouped fields">
            <label>상품 후기 자동 보이기</label>
            <div class="field">
                <div class="ui radio checkbox" >
                    <input type="radio" name="is_product_review_display" value="1" <?=my_set_checked($row,'is_product_review_display','1')?>>
                    <label for="is_product_review_display">예</label>
                </div>
            </div>
            <div class="field">
                <div class="ui radio checkbox" >
                    <input type="radio" name="is_product_review_display" value="0" <?=my_set_checked($row,'is_product_review_display','0')?>>
                    <label for="is_product_review_display">아니오</label>
                </div>
            </div>
        </div>           


    <!-- 메인상품 설정
    <?php for($i=0; $i < count($products) ; $i++){
        if($i%5 === 0) echo "<br>"    ;
        ?>
    <input type='radio' name='representative_product' value='<?=$products[$i]->id?>' <?=my_set_checked($row,'representative_product',"{$products[$i]->id}")?>/><?=$products[$i]->name?></label>
    <?php }?> -->


    <input class="ui button positive" type="submit" value="수정">
    </form>
</div>



<div class="sixteen wide column" style="margin-top:50px;">
<h1 class="ui horizontal divider header">
    <i class="plus icon"></i>
    메인상품 설정
    </h1>

    <form  onsubmit="ajax_submit(this); return false;" action="<?=my_site_url(admin_product_uri."/ajax_option_add/main")?>" method ="post" class="ui form">
        <?php for($i=0; $i < count($products) ; $i++){
        if($i%5 === 0) echo "<br>"    ;
        ?>
        <input type='radio' name='product_id' value='<?=$products[$i]->id?>' <?=my_set_checked($row,'representative_product',"{$products[$i]->id}")?>/>
        <a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}?menu_name=상품&sub_name=상품관리")?>"> <?=$products[$i]->name?></a>
        <?php }?> 

        <div class="field">
            <input type="text" name="sort" placeholder="순서">
        </div>
        <input class="ui button positive" type="submit" value="추가">
    </form>

    <h3 class="ui left floated header">추가된 메인상품 리스트</h3>
    <div class="ui clearing divider"></div>

    <ol class="ui list">
        <?php for($i=0 ; $i < count($products_main); $i++){?>
            <div style="display:block">
            <li style="display:inline-block" ><?=$products_main[$i]->name?></li>
            순서수정
            <form  onsubmit="ajax_submit(this); return false;" style="display:inline-block" class="ui form" style="display:inline-block;" action="<?=my_site_url(admin_product_uri."/ajax_option_update/{$products_main[$i]->option_id}")?>" method="post">
                <input value="<?=set_value_data($products_main[$i],'sort')?>" type="text" name="sort" style="display:inline-block; width:50px;">
                <input class="ui button basic positive" type="submit" value="순서수정">
            </form>
            <!-- <a  class="ui button basic positive" style="display:inline-block"onclick="confirm_redirect('<?=site_url(admin_product_uri."/option_delete/{$products_main[$i]->id}/desc")?>','정말 삭제하시겠습니까')" href="#">삭제</a> -->
            <a onclick="confirm_callback(this,ajax_a,'복구할 방법이 없습니다. 삭제하시겠습니까?'); return false;" data-action="<?=site_url(admin_product_uri."/ajax_option_delete/{$products_main[$i]->option_id}/main")?>" href="#" class="ui button basic positive" style="display:inline-block">삭제</a>
            </div>
        <?php }?>
    </ol>




</div>
