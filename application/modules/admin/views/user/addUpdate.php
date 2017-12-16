
<!-- 프로필 사진 시작-->
<iframe id="profilePhoto_upload" src="<?=site_url(user_uri."/profilePhoto_upload")?>" width="300px" height="200px">
</iframe>   
<!-- 프로필 사진 끝 -->

<form action ="<?=my_site_url(admin_user_uri."/{$mode}")?>"method="POST" >
<input type='hidden' name='profilePhoto' value="<?=set_value_data($user,'profilePhoto')?>"/> <br/>

아이디<input placeholder="아이디" type="text" name="userName" value="<?=set_value_data($user,'userName')?>"/>
<br>

<?php if(strpos($mode,"add") !== false ){?>
    비밀번호<input placeholder="비밀번호" type="password" name="password" />
<?php }?>

<br/>
    이름<input placeholder="이름" type="text" name="name" value="<?=set_value_data($user,'name')?>"/> <?=form_error('name',false,false)?>
    <br>
    별명<input placeholder="별명" type="text" name="nickName" value="<?=set_value_data($user,'nickName')?>"/> <?=form_error('nickName',false,false)?>
 <br>소개<input placeholder="소개" type="text" name="intro" value="<?=set_value_data($user,'intro')?>"/>
 <br/>

 회원종류
 <select name="kind" id="">
 <option value="general" <?=my_set_selected($user,'kind','general')?> >일반</option>
 <option value="corporate" <?=my_set_selected($user,'kind','corporate')?>>기업회원</option>
 <option value="panel" <?=my_set_selected($user,'kind','panel')?>>패널</option>
 </select>
 <br/>
 <!-- <input type="hidden" name="kind" value="<?=$kind?>"> -->

주소 <input name="postal_number" value="<?=set_value_data($user,'postal_number')?>" type="hidden" id="sample3_postcode" placeholder="우편번호">
<input name="address" value="<?=set_value_data($user,'address')?>" type="text" id="sample3_address" class="d_form large" placeholder="주소"> 
<input name="address_more" value="<?=set_value_data($user,'address_more')?>" type="text" placeholder="상세주소">
<input type="button" onclick="sample3_execDaumPostcode()" value="우편번호 찾기">
<div id="address_search_wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
<img src="//t1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>
 

 <br/>
 성별 
 <input type="radio" name="sex" value="남" <?=my_set_checked($user,'sex','남')?>>남
 <input type="radio" name="sex" value="여" <?=my_set_checked($user,'sex','여')?>>여
 <?=form_error('sex',false,false)?>
 <br/>
 나이 
 <select name="year">
 <?php
 for($i= date('Y')-80 ; $i < date('Y')-5; $i++ ){?>
     <option value="<?=$i?>" <?=my_set_selected($user,'year',$i)?> ><?=$i?></option>
     <?php }?>
 </select>
 년
  <select name="month">
    <?php for($i=1 ; $i<=12 ; $i++){?>
     <option value="<?=get_duble_digit($i)?>"  <?=my_set_selected($user,'month',get_duble_digit($i))?> ><?=$i?></option>
    <?php }?> 
 </select>
 월
  <select name="day">
     <?php for($i=1 ; $i<=31 ; $i++){?>
     <option value="<?=get_duble_digit($i)?>" <?=my_set_selected($user,'day',get_duble_digit($i))?> ><?=$i?></option>
    <?php }?> 
 </select>

 일
 <br>
 연락처<input placeholder="연락처" type="text" name="phone" value="<?=set_value_data($user,'phone')?>"/>

 <br/>
 
 이메일<input placeholder="이메일" type="text" name="email" value="<?=set_value_data($user,'email')?>"/>
 <br/>

 
 <br/>
 
 <input type="submit" name="register" />
</form>


