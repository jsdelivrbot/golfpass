
<article>
<!-- <form method="post"action="<?=site_url(shop_order_uri."/ajax_payment_check_update")?>">
<input type="text" name="imp_uid" value="imp_057318712869">
<input type="text" name="merchant_uid" value="merchant_1507458282433">
<input type="text" name="pay_method" value="vbank">
<input type="submit">
</form> -->

<style>
li{
    display:inline;
}
</style>

<?php  for($i=0; $i<count($cartlist); $i++){ ?>
<ul>
    <li><?=$cartlist[$i]->p_name?></li>
    <li>개수<?=$cartlist[$i]->p_count?></li>
    <li>개당가격<?=$cartlist[$i]->p_price?></li>
    <li>총가격<?=$cartlist[$i]->p_total_price?></li>
</ul>
<?php }?>
총합계 <?=$total_price?>


<form  id="form_order" onsubmit="alert_payment_window(this); return false;"  action="<?=site_url(shop_order_uri."/ajax_add")?>"method ="post">
 주문자이름<input type="text" name="user_name" value="<?=set_value_data($user,'user_name')?>"><br>
 이메일<input type="text" name="email" value="<?=set_value_data($user,'email')?>"><br>
 전화번호<input type="text" name="phone" value="<?=set_value_data($user,'phone')?>"><br>
 <input type="hidden" name="order_name" value="<?=$order_name?>">
 <input type="hidden" name="total_price" value="<?=$total_price?>">
 <input type="hidden" name="merchant_uid">
 <?php for($i = 0 ; $i< count($cartlist); $i++){?>
    <input type="hidden" name ="product_id[]" value ="<?=$cartlist[$i]->p_id?>" >
    <input type="hidden" name ="count[]" value ="<?=$cartlist[$i]->p_count?>" >
    <input type="hidden" name="price[]" value="<?=$cartlist[$i]->p_price?>">
 <?php }?>


<!-- 비회원 -->
 <!-- <?php if(isset($_GET['guest_order'])){?>
 비밀번호<input type="password" name="password">(비회원 주문자 조회시 필수)<br>
 비밀번호확인<input type="password" name="re_password">(비회원 주문자 조회시 필수)<br>
 <?php }?> -->
<!-- 비회원 -->

 <select name="pay_method" id="">
    <option value="card">신용카드</option>
    <option value="trans">실시간계좌이체</option>
    <option value="vbank">가상계좌</option>
    <option value="phone">휴대폰소액결제</option>
    <!-- 이니시스 전용 -->
    <option value="samsung">삼성페이</option> 
    <!-- 이니시스 전용 -->
    <option value="kpay">KPay앱 직접호출</option>
    <!-- 이니시스, LGU+ 전용 -->
    <option value="cultureland">문화상품권</option>
    <!-- 이니시스, LGU+ 전용 -->
    <option value="smartculture">스마트문상</option> 
    <option value="happymoney">해피머니</option> 이니시스 전용
 <!-- LGU+전용 -->
 <!-- <option value="booknlife">도서문화상품권</option> -->
 </select>

<input type="submit" value="주문하기">
</form>
</article>
<script src="https://service.iamport.kr/js/iamport.payment-1.1.5.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    IMP.init('imp52394971'); // 아임포트 관리자 페이지의 "시스템 설정" > "내 정보" 에서 확인 가능
   
})


function validation(e){
    var name = $(e).find("input[name=user_name]").val();
    var phone = $(e).find("input[name=phone]").val();
    var email = $(e).find("input[name=email]").val();
    var pay_method = $(e).find("select[name=pay_method] option:selected").val();

   //유효성검사
   if(!name || !phone || !email || !pay_method){
        alert('모두 입력해주세요.');
        console.log(name+phone+email+pay_method);
        return false;
        }

    //비밀번호 유효성검사
    var $password =  $(e).find("input[name=password]");
    if($password[0]){
        var re_password =  $(e).find("input[name=re_password]").val();
        var password = $password.val();
        if(password !== re_password){
            alert('비밀번호가 일치하지 않습니다.');
            return false;
        }
        if(!password){
            alert("비밀번호를 입력해주세요");
            return false;
        }
    }
    return true;
}
function alert_payment_window(e){
    var merchant_uid = 'merchant_' + new Date().getTime();
    $(e).find("input[name=merchant_uid]").val(merchant_uid);
    var name = $(e).find("input[name=user_name]").val();
    var phone = $(e).find("input[name=phone]").val();
    var email = $(e).find("input[name=email]").val();
    var pay_method = $(e).find("select[name=pay_method] option:selected").val();

    if(!validation(e)){
        return false;
    }
    
    ajax_submit(e);

    
    IMP.request_pay({
        pg : 'html5_inicis',
        pay_method : pay_method,
        escrow : false,
        merchant_uid :merchant_uid,
        name : "<?=$order_name?>",
        amount : <?=$total_price?>,
        buyer_email : email,
        buyer_name : name,
        buyer_tel : phone,
        buyer_addr : '서울특별시 강남구 삼성동',
        buyer_postcode : '123-456'
    }, function(rsp) {
        // var rsp =rsp;
        var payment_check;
        if ( rsp.success ) {
            //[1] 서버단에서 결제정보 조회를 위해 jQuery ajax로 imp_uid 전달하기
            $.ajax({
                url: "<?=site_url(shop_order_uri."/ajax_payment_check_update")?>", //cross-domain error가 발생하지 않도록 동일한 도메인으로 전송
                type: 'POST',
                dataType: 'json',
                data: {
                    imp_uid : rsp.imp_uid,
                    merchant_uid : rsp.merchant_uid,
                    pay_method : rsp.pay_method,
                    status : rsp.status,
                    apply_num :rsp.apply_num,
                    vbank_num :rsp.vbank_num,
                    vbank_name :rsp.vbank_name,
                    vbank_holder :rsp.vbank_holder,
                    vbank_date :rsp.vbank_date,
                    success : rsp.success
                    //기타 필요한 데이터가 있으면 추가 전달
                },
                success :function(data){
                    payment_check = data['payment_check'];
                }
            }).done(function(data) {
                //[2] 서버에서 REST API로 결제정보확인 및 서비스루틴이 정상적인 경우
                if ( payment_check ==='paid' || payment_check === 'vbank' ) {

                    var merchant_uid = rsp.merchant_uid.substring(9,rsp.merchant_uid.length);
                    window.location.href = "<?=site_url(shop_order_uri.'/complete')?>"+"/"+merchant_uid;
                  
                    // var msg = '결제가 완료되었습니다.';
                    // msg += '\n고유ID : ' + rsp.imp_uid;
                    // msg += '\n상점 거래ID : ' + rsp.merchant_uid;
                    // msg += '\결제 금액 : ' + rsp.paid_amount;
                    // msg += '카드 승인번호 : ' + rsp.apply_num;
    
                    // alert(msg);
                } else {
                    $.ajax({
                        url: "<?=site_url(shop_order_uri."/ajax_payment_error_cancel")?>", //cross-domain error가 발생하지 않도록 동일한 도메인으로 전송
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            imp_uid : rsp.imp_uid,
                            merchant_uid : rsp.merchant_uid
                            //기타 필요한 데이터가 있으면 추가 전달
                        }
                    }).done(function(data){
                        alert(payment_check + ": 정상적인 경로로 이용해주세요. 자동취소 됩니다.");
                        //[3] 아직 제대로 결제가 되지 않았습니다.
                        //[4] 결제된 금액이 요청한 금액과 달라 결제를 자동취소처리하였습니다.
                    });

                  
                }
            });
        } else {
            if(rsp.error_msg ==="사용자가 결제를 취소하셨습니다" ){
                $.ajax({
                    url: "<?=site_url(shop_order_uri."/ajax_payment_user_cancel")?>", //cross-domain error가 발생하지 않도록 동일한 도메인으로 전송
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        merchant_uid : rsp.merchant_uid
                        //기타 필요한 데이터가 있으면 추가 전달
                    }
                })
            }
            var msg = '죄송합니다 .결제에 실패하였습니다. 다시 시도 해주세요.';
            msg += '에러내용 : ' + rsp.error_msg;
            console.log(msg);
        }

    });
}

</script>