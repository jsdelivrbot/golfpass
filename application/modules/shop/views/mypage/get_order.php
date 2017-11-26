
<div style="margin-top:-160px;"></div> 
<div style="height:100% ;background-image: url(<?=$photo?>); background-repeat:no-repeat; background-position:center; background-size:cover;  background-attachment: fixed;">
<div style="height:100%; background-color: rgba(0,0,0,0.2)">
<div class="ui centered grid container">
<div class="sixteen wide column" style="max-width:700px">
<div style="margin-top:160px;"></div> 
    <a href="<?=site_url(shop_mypage_uri."/gets_order")?>" class="ui button positive">마이페이지로</a>
<div class="ui attached message">
    <div class="header">
        주문완료
    </div>
    <p>골프패스를 이용해주셔서 감사합니다.</p>
</div>
<div class="ui form attached fluid segment">
  <!-- <div class="two fields"> -->
    <div class="field">
        <div class="ui header">결제정보</div>
        <label>결제일 <?=$order->created?></label>
        <label>상품이름 <?=$product->name?></label>
        <label>총결제금액<?=$order->total_price?></label>
        <label>주문번호 <?=$order->merchant_uid?></label>
        <label>주문자명 <?=$order->user_name?></label>
        <label>결제방식 <?=$order->pay_method_enum?></label>
        <label>결제상태 <?=$order->status_enum?></label>
        <label>비고 <?=$order->remarks?></label>
    </div>
    
  <!-- </div> -->

  <div class="ui divider"></div>
  <div class="field">
  
    <?php if($order->pay_method === 'vbank'){?>
        <div class="ui header">가상계좌 입금정보</div>
        <label>은행 <?=$order->vbank_name?></label>
        <label>예금주 <?=$order->vbank_holder?></label>
        <label>계좌번호 <?=$order->vbank_num?></label>
        <label>입금기한 <?=$order->vbank_date?></label>
    <?php } ?>
    
    <?php if( $order->pay_method === 'bank'){?>
        <div class="ui header">무통장입금정보</div>
        <label>은행 <?=$setting->bank_name?></label>
        <label>예금주 <?=$setting->bank_holder?></label>
        <label>계좌번호 <?=$setting->bank_num?></label>
    <?php } ?>

    </div>
 
  <!-- <div class="ui blue submit button">Submit</div> -->
</div>
<div class="ui bottom attached warning message">
  <i class="icon help"></i>
  도움이 필요하십니까? <a href="#">02-6959-5454</a>
</div>
</div>
</div>
</div>
</div>

<!-- <br>동행자 -->
<form action="<?=site_url(shop_order_uri."/update_info/{$order->merchant_uid}")?>" method="post" class="ui form">
<?php for($i=0;$i < count($order_infos) ;$i++){   ?>
    <div class="four fields">
        <div class="field">
            <label for="">이름</label>
            <input type="text" name="name_with[]" value="<?=$order_infos[$i]->name_with?>">
        </div>
        <div class="field">
            <label for="">영어 이름</label>
            <input type="text" name="eng_name_with[]" value="<?=$order_infos[$i]->eng_name_with?>">
        </div>
        <div class="field">
            <label for="">휴대폰</label>
            <input type="text" name="phone_with[]" value="<?=$order_infos[$i]->phone_with?>">
        </div>
        <div class="field">
            <label for="">이메일</label>
            <input type="text" name="email_with[]" value="<?=$order_infos[$i]->email_with?>">
        </div>
    </div>
    <?php }?>

    <input type="submit" class="ui button baisc" value="동행자 정보 수정">
</form>
<?php if($order->status === "paid" || $order->status === "confirm"){?>
<div class="sixteen wide column">
<a onclick="confirm_redirect('<?=my_site_url(shop_mypage_uri."/update_order_status/{$order->id}")?>','정말 환불 요청 하시겠습니까?'); return false;" href="#">환불요청</a>
</div>
<?php }?>
<div style="margin-top:-100px;"></div> 






