
<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">

<?php }?>
<div style="margin-top:-160px;"></div> 
<div style="background-image: url(<?=$photo?>); background-repeat:no-repeat; background-position:center; background-size:cover;  background-attachment: fixed;">
<div style="height:100%; background-color: rgba(38, 38, 38, 0.85)">
<div class="ui centered grid container">
<div class="sixteen wide column" style="max-width:700px">
<div style="margin-top:160px;"></div> 
    <a href="<?=site_url(shop_mypage_uri."/gets_order")?>" class="ui button positive">마이페이지</a>
<div class="ui attached message">
    <div class="header">
        주문 완료
    </div>
    <p>골프패스를 이용해주셔서 감사합니다.</p>
    <? if($product_type == "package"): ?>
    <p>담당자가 세부내용 확인을 위해 유선으로 연락 드리겠습니다.</p>
    <p>지연될 시에는 02-6959-5454로 연락주시면 친절히 안내 도와드리겠습니다.</p>
    <? endif ?>
</div>
<div class="ui attached message">
    <div class="header">
        <a href="https://goo.gl/forms/vB4WLBUcZepcy8iC3" style="font-size:20px;">동행자 정보 등록하러 가기</a>
    </div>
</div>
<div class="ui form attached fluid segment">
  <!-- <div class="two fields"> -->
    <div class="field">
        <div class="ui header">결제 정보</div>
        <label>결제일 : <?=$order->created?></label>
        <label>상품 이름 : <?=$product->name?></label>
        <label>총 결제 금액 : <?=number_format($order->total_price)?>원</label>
        <label>주문 번호 : <?=$order->merchant_uid?></label>
        <label>주문자 : <?=$order->user_name?></label>
        <label>결제 방식 : <?=$order->pay_method_enum?></label>
        <label>결제 상태 : <?=$order->status_enum?></label>
    </div>
    
  <!-- </div> -->

  <div class="ui divider"></div>
  <div class="field">
  
    <?php if($order->pay_method === 'vbank'){?>
        <div class="ui header">가상 계좌 입금정보</div>
        <label>은행 : <?=$order->vbank_name?></label>
        <label>예금주 : <?=$order->vbank_holder?></label>
        <label>계좌 번호 : <?=$order->vbank_num?></label>
        <label>입금 기한 : <?=$order->vbank_date?></label>
    <?php } ?>
    
    <?php if( $order->pay_method === 'bank'){?>
        <div class="ui header">무통장 입금 정보</div>
        <label>은행 : <?=$setting->bank_name?></label>
        <label>예금주 : <?=$setting->bank_holder?></label>
        <label>계좌 번호 : <?=$setting->bank_num?></label>
    <?php } ?>

    </div>
 
  <!-- <div class="ui blue submit button">Submit</div> -->
</div>
<div class="ui bottom attached warning message">
  <i class="icon help"></i>
  도움이 필요하십니까? <a href="#">02-6959-5454</a>
</div>
<div class="ui bottom attached warning message" style="background-color:#3a68b2; border:0; color:#fff; cursor: pointer;" onclick="location.href='http://www.widemobile.com/?golfpass';">>
    <img src="/public/sangmin/img/partner/partner_wifi.png" alt="">
    <p>해외 여행 갈 땐 와이파이 도시락!</p>
</div>
<div class="ui bottom attached warning message" style="background-color:#fed003; border:0; color:#000; cursor: pointer;" onclick="location.href='http://www.timescar-rental.kr/af/7822000076/kr/';">>
    <img src="http://golfpass.net/public/sangmin/img/partner/partner_timescar.png" alt="">
    <p>이제 비싼 송영말고 렌트하자! 타임즈 렌트카</p>
</div>
</div>
</div>
</div>
</div>
<!-- <br>동행자 -->
<?php for($i=0;$i < count($order_infos) ;$i++){   ?>
<!-- <ul>
<li>동행자이름 <?=$order_infos[$i]->name_with?></li>
<li>영어이름 <?=$order_infos[$i]->eng_name_with?></li>
<li>휴대폰 <?=$order_infos[$i]->phone_with?></li>
<li>이메일 <?=$order_infos[$i]->email_with?></li>
</ul> -->
<?php }?>
<div style="margin-top:-100px;"></div> 






