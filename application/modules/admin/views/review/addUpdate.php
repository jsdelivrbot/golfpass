
<!-- <div class="sixteen wide column"> -->

<?php if(strpos($mode,"update") !== false){?>
    <h3 class="ui header">상품명 :
         <a href="<?=site_url(admin_product_uri."/update/{$content->product_id}")?>"><?=$content->product_name?></a>
          | <a href="<?=site_url(shop_product_uri."/get/{$content->product_id}")?>">사이트에서 보기</a>    
    </h3>

    <h3 class="ui header">글쓴이 : <?=$content->user_name?></h3>
    <div class="ui divider"></div>    
    <br>

    <?php }?>   
    <form class="ui form" action="<?=my_site_url(admin_product_review_uri."/$mode")?>" method="post">


    <div class="two fields">
        <div class="field">
            <label>상품후기 보이기</label>
            <input type="radio" name="is_display" value="1" <?=my_set_checked($content,'is_display','1')?>>예
            <input type="radio" name="is_display" value="0" <?=my_set_checked($content,'is_display','0')?>>아니오
        </div>
        <div class="field">
            <label>상품 후기 점수적용 </label>
            <input type="radio" name="is_secret" value="0" <?=my_set_checked($content,'is_secret','0')?>>예
            <input type="radio" name="is_secret" value="1" <?=my_set_checked($content,'is_secret','1')?>>아니오
        </div>
    </div>
    <?php if(strpos($mode,"add") !== false){?>
    <div class="two fields">
        <div class="field">
            <label>갯수</label>
            <input type="text" name="num_reviews" value="1" >
        </div>
    
    </div>
    <?php }?>
    <div class="four fields">

        <div class="field">
            <label>점수1</label>
            <input type="text" name="score_1" value="<?=set_value_data($content,'score_1')?>" >
        </div>
        <div class="field">
            <label>점수2</label>
            <input type="text" name="score_2" value="<?=set_value_data($content,'score_2')?>">
        </div>
        <div class="field">
            <label>점수3</label>
            <input type="text" name="score_3" value="<?=set_value_data($content,'score_3')?>">
        </div>

        <div class="field">
            <label>점수4</label>
            <input type="text" name="score_4" value="<?=set_value_data($content,'score_4')?>">
        </div>
    

    </div>

    <div class="four fields">
          <div class="field">
            <label>점수5</label>
            <input type="text" name="score_5" value="<?=set_value_data($content,'score_5')?>">
        </div>
        <div class="field">
            <label>점수6</label>
            <input type="text" name="score_6" value="<?=set_value_data($content,'score_6')?>">
        </div>
        <div class="field">
            <label>점수7</label>
            <input type="text" name="score_7" value="<?=set_value_data($content,'score_7')?>">
        </div>
        <div class="field">
            <label>점수8</label>
            <input type="text" name="score_8" value="<?=set_value_data($content,'score_8')?>">
        </div>
    </div>
    <div class="four fields">
       <div class="field">
            <label>점수9</label>
            <input type="text" name="score_9" value="<?=set_value_data($content,'score_9')?>">
        </div>
    </div>





<!-- <input placeholder="제목" type="text" name="title" value="<?=set_value_data($content,'title')?>" > <?=form_error('title',false,false)?><br>  -->
<textarea placeholder="내용" name="desc" rows="10" cols="80">
<?=set_value_data($content,'desc')?>
</textarea>
<?=form_error('desc',false,false)?>
<?php if(strpos($mode,"add") !== false){?>
    
    <div class="grouped  fields">
        <label for="product_id">상품목록</label>
        <br>
        <div style="color:red"><?=form_error('product_id',false,false)?></div>
        <?php for($i=0 ; $i<count($products) ; $i++){
        if($i%5 === 0) echo "<br>"    ;?>
        <div class="field" >
            <div class="ui radio checkbox" >
                <input type='radio' name='product_id' value='<?=$products[$i]->id?>' <?=my_set_checked($content,'product_id','<?=$products[$i]->id?>')?>/>
                <label><a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>"><?=$products[$i]->name?></a></label>
            </div>
        </div>
        <?php }
        ?>
    </div>
    
<?php }else{?>
<input type="hidden" name="product_id" value="<?=$content->product_id?>">
<?php }?>
<input style="margin-top:10px;"class="ui button basic positive"type="submit" value="보내기">
</form>


<!-- ckeditor -->
<script src="<?=domain_url('/public/lib/ckeditor_full/ckeditor.js')?>"></script>
<script>
 CKEDITOR.replace( 'desc',{
    filebrowserUploadUrl: '/index.php<?=common_uri?>/upload_receive_from_ck'
 } );

</script>
