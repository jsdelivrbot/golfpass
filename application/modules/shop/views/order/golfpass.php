총금액<?=$total_price?>
<form  id="form_order" onsubmit="alert_payment_window(this); return false;"  action="<?=site_url(shop_order_uri."/golfpass_ajax_add")?>"method ="post">


    홀수 추가
    <input type="text">

    <br>
    싱글룸추가
    <input type="text">

    <br>
    기타옵션 추가
    <input type="text">

    <br>
    동행자 정보 입력(<?=$num_people-1?>명)
    <?php for($i = 0 ; $i < $num_people-1; $i++){ ?>
    <br><input type="text" name="name_with[]" placeholder="이름">
    <br><input type="text" name="visa[]" placeholder="비자번호">
    <?php }?>
    <br>
<!-- <input type="submit" value="예약"> -->



 주문자이름<input type="text" name="user_name" value="<?=set_value_data($user,'user_name')?>"><br>
 휴대폰번호<input type="text" name="phone" value="<?=set_value_data($user,'phone')?>"><br>
 주소<input type="text" name="address" value="<?=set_value_data($user,'address')?>"><br>
 이메일<input type="text" name="email" value="<?=set_value_data($user,'email')?>"><br>
 <input type="hidden" name="product_id" value="<?=$product_id?>">
 <input type="hidden" name="merchant_uid">
    <input type="hidden" name="start_date" value="<?=$start_date?>">
    <input type="hidden" name="end_date" value="<?=$end_date?>">
    <input type="hidden" name="num_people" value="<?=$num_people?>">
    <input type="hidden" name="total_price" value="<?=$total_price?>">
    <input type="hidden" name="order_name" value="<?=$product->name?>">

 <select name="pay_method" id="">
    <option value="bank">무통장</option>
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


<!-- <input type="submit"> -->

</form>

</article>
<script src="https://service.iamport.kr/js/iamport.payment-1.1.5.js" type="text/javascript"></script>


<script>

// //아이엠포트 초기화
// $(document).ready(function(){
    


   

// })

IMP.init('imp52394971'); // 아임포트 관리자 페이지의 "시스템 설정" > "내 정보" 에서 확인 가능


function validation(e){
    
   //유효성검사
//    if(!name || !phone || !email || !pay_method){
//         alert('모두 입력해주세요.');
//         console.log(name+phone+email+pay_method);
//         return false;
//         }

   
    return true;
}

//결제 ajax로 총가격 체크후 iamport api 불러오기
function alert_payment_window(e)
{
    $form =$(e);
    var pay_method = $form.find("select[name=pay_method] option:selected").val();
    var merchant_uid = 'merchant_' + new Date().getTime(); //고유주문번호 merchant_uid
    $form.find("input[name=merchant_uid]").val(merchant_uid);
    var name = $form.find("input[name=user_name]").val(); //유저정보
    var totalPrice = $form.find("input[name=total_price]").val();
    var startDate = $form.find("input[name=start_date]").val();
    var endDate = $form.find("input[name=end_date]").val();
    var product_id = $form.find("input[name=product_id]").val();
    var num_people = $form.find("input[name=num_people]").val();
    var orderName = $form.find("input[name=order_name]").val();
    var address = $form.find("input[name=address]").val();
    var phone = $form.find("input[name=phone]").val();
    var email = $form.find("input[name=email]").val();
    if(!validation(e)){
        return false;
    }
    var $form =$(e);
    var queryString = $form.serialize();
    var url = $form[0].action;
    $.ajax({
        type: "POST",
        dataType : 'json',
        data: queryString,
        url: url,
        beforeSend: function(){
            $('.loading').fadeIn(500);
        },
        success:function(data){
            
            //무통장 입금일때
            if(pay_method === 'bank')
            {
                merchant_uid=merchant_uid.replace("merchant_","");
                window.location.href = "<?=site_url(shop_order_uri.'/complete')?>"+"/"+merchant_uid;
                return;
            }
            //----------------아이엠포트 결제모듈 불러오기 시작-------------
            IMP.request_pay({
                pg : 'html5_inicis',
                pay_method : pay_method,
                escrow : false,
                merchant_uid :merchant_uid,
                name : orderName,
                amount : totalPrice,
                buyer_email : email,
                buyer_name : name,
                buyer_tel : phone,
                buyer_addr : address,
                buyer_postcode : '000-000'
            }, function(rsp) {
                // var rsp =rsp;
                var payment_check;
                if ( rsp.success ) {
                    //[1] 서버단에서 결제정보 조회를 위해 jQuery ajax로 imp_uid 전달하기
                    $.ajax({
                        url: "<?=site_url(shop_order_uri."/golfpass_ajax_payment_check_update")?>", //cross-domain error가 발생하지 않도록 동일한 도메인으로 전송
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            start_date : startDate,
                            end_date : endDate,
                            num_people : num_people,
                            //
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
                        console.log(data);
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

              //----------------아이엠포트 결제모듈 불러오기 끝-------------
        },
        error: function(xhr, textStatus, errorThrown){
            alert('에러... or 데이터 용량이 너무많습니다.');
            $('.loading').fadeOut(500);
            console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
            console.log(errorThrown);
        }
    });

      
    
}


</script>

