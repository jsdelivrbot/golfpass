<?php if(is_semantic_dev) {?>
    <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less">
<script src="/public/framework/semantic/src/less.min.js"></script>
<?php }else{?>
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css">
<link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.js">

<?php }?>

<div style="margin-top:150px;"></div>

<div class="ui grid container">
    <div class="sixteen wide column">

    

    <div class="ui horizontal statistic">
  <div class="value">
  총금액
  <div id="total_price"><?=number_format($total_price)?></div>
  </div>
  <div class="label">
  </div>
</div>


<!-- <div class="ui header"> </div> -->
<form  class="ui form" id="form_order" onsubmit="alert_payment_window(this); return false;"  action="<?=site_url(shop_order_uri."/golfpass_ajax_add")?>"method ="post">
  
<?php if($product->singleroom_price !== "0"){?>
    <div class="four fields">
        <div class="field">
            <label for=""><h3>싱글룸추가</h3></label>
            <select name="singleroom" id="">
                <option  value="" data-price="0">선택안함</option>
                <?php 
                $i =($num_people %2 ===0) ? 2 :1 ;
                for(; $i <= $num_people; $i=$i+2){
                    $added_singleroom_price =$i*($product->singleroom_price);
                    ?>
                <option value="<?=$i?>" data-price="<?=$added_singleroom_price?>">
                    <?="{$i}인"?>
                    <!-- <?="{$i}인(".$added_singleroom_price."원 추가)"?> -->
                </option>
                <?php }?>
            </select>
        </div>
    </div>
<?php }?>
    <!-- 홀옵션추가 -->
    <?php if ( !isset($hotel) ): ?>
    <div class="four fields">
        <div class="field">
        <label><h3>홀 추가</h3></label>
            <select class="ui fluid dropdown" name="hole_option">
                <option value="" data-price="0">선택</option>
                <?php for($i=0; $i<count($hole_options) ; $i++){
                    $added_hole_price =  $hole_options[$i]->price * $num_people;
                    ?>
                <option data-name="<?=$hole_options[$i]->name?>" data-price="<?=$added_hole_price?>" value="<?=$hole_options[$i]->id?>"><?=$hole_options[$i]->name?>

                <!-- (<?=$hole_options_price[$i]?>원 추가) -->
                </option>
                <?php }?>
            </select>
        </div>
    </div>
    <?php endif; ?>
    <!-- 홀옵션추가 -->

    <!-- 기타옵션추가 -->
    <div class="four fields">
        <div class="field">
        <label><h3>기타옵션 추가</h3></label>
            <select class="ui fluid dropdown" name="" id="options">
                <option data-price="0">선택</option>
            <?php for($i=0; $i<count($options) ; $i++){?>
                <option data-name="<?=$options[$i]->name?>" data-price="<?=$options[$i]->price?>" value="<?=$options[$i]->id?>">
                    <?=$options[$i]->name?>
                    <!-- (<?=$options[$i]->price?>원 추가) -->
                </option>
                <?php }?>
            </select>
        </div>
    </div>
        <button class="ui button basic" type="button" id="add_option">추가</button>
    <div class="field"id="added_option_list">
    </div>
                <!-- 기타옵션추가 -->

<!-- 희망시간대 -->
<div class="field">
    <input type="text" name="hope_date" placeholder="희망시간대">
</div>
<!-- 희망시간대 -->
 <!-- 동행자정보 -->
 <br><br>
<label><h3> 동행자 정보 입력(<?=$num_people?>명)</h3></label>
<br>

<?php for ( $i = 0 ; $i < count($groups) ; $i++ ): ?>
    <input type="hidden" name="groups[]" value="<?=$groups[$i]?>">
    <?=chr(65+$i)?>조
    <br>
    <?php for ($j = 0 ; $j < (int)$groups[$i] ; $j++ ): ?>
        <div class="four fields">
            <div class="field">
                <input type="text" name="name_with[]" placeholder="이름">
            </div>
            <div class="field">
                <input type="text" name="eng_name_with[]" placeholder="영문이름">
            </div>
            <div class="field">
                <input type="text" name="email_with[]" placeholder="이메일">
            </div>
            <div class="field">
            <input type="text" name="phone_with[]" placeholder="연락처">
            </div>
        </div>
    <?php endfor; ?>
<?php endfor; ?>
               
    <!-- 동행자정보 -->
    <br><br>
<!-- <input type="submit" value="예약"> -->
<label><h3>주문자정보</h3></label>
<div class="two fields">
    <div class="field">
        <label>주문자이름</label>
        <input type="text" name="user_name" value="<?=set_value_data($user,'name')?>"><br>
    </div>
    <div class="field">
        <label>휴대폰번호</label>
        <input type="text" name="phone" value="<?=set_value_data($user,'phone')?>"><br>
    </div>
</div>
<div class="two fields">
    <div class="field">
        <label>주소</label>
        <input type="text" name="address" value="<?=set_value_data($user,'address')?>"><br>
    </div>
    <div class="field">
        <label>이메일</label>
        <input type="text" name="email" value="<?=set_value_data($user,'email')?>"><br>
    </div>
</div>
 <input type="hidden" name="product_id" value="<?=$product_id?>">
 <input type="hidden" name="merchant_uid">
    <input type="hidden" name="start_date" value="<?=$start_date?>">
    <input type="hidden" name="end_date" value="<?=$end_date?>">
    <input type="hidden" name="num_people" value="<?=$num_people?>">
    <input type="hidden" name="total_price" value="<?=$total_price?>">
    <input type="hidden" name="order_name" value="<?=$product->name?>">

    <div class="four fields">
    <div class="field">
        <select class="ui fluid dropdown"name="pay_method" id="">
            <option value="bank">무통장</option>
            <option value="card">신용카드</option>
            <option value="trans">실시간계좌이체</option>
            <option value="vbank">가상계좌</option>
            <!-- <option value="phone">휴대폰소액결제</option> -->
            <!-- 이니시스 전용 -->
            <option value="samsung">삼성페이</option> 
            <!-- 이니시스 전용 -->
            <option value="kpay">KPay앱 직접호출</option>
            <!-- 이니시스, LGU+ 전용 -->
            <!-- <option value="cultureland">문화상품권</option> -->
            <!-- 이니시스, LGU+ 전용 -->
            <!-- <option value="smartculture">스마트문상</option>  -->
            <!-- <option value="happymoney">해피머니</option> 이니시스 전용 -->
        <!-- LGU+전용 -->
        <!-- <option value="booknlife">도서문화상품권</option> -->
        </select>
    </div>
    </div>
<input class="ui button basic positive" type="submit" value="주문하기">


<!-- <input type="submit"> -->

</form>
</div>
</div>
<script src="https://service.iamport.kr/js/iamport.payment-1.1.5.js" type="text/javascript"></script>


<script>
    let $form =$("#form_order");
 function cal_totalPrice()
    {
         var queryString = $form.serialize();
        var url = "<?=site_url(shop_order_uri."/cal_total_price_ajax")?>";
        $.ajax({
            type: "POST",
            dataType : 'json',
            data: queryString,
            url: url,
            beforeSend: function(){
                $('.loading').fadeIn(500);
            },
            success:function(data){
                console.log(data);
                var total_price= data.total_price;
                 $("#total_price").text(total_price.toLocaleString('en'));
                $("input[name=total_price]").val(total_price);
            }
        });

    }
//아이엠포트 초기화
// var base_totalPrice  = <?=$total_price?>;
// var g_totalPrice = <?=$total_price?>;
$(document).ready(function(){
    $("#add_option").click(function()
    {
        $options =$("#options");
        $selected =  $options.find("option:selected");
        if($selected.text() ==="선택") return false;
        var option_id= $selected.val();
        var option_price = $selected.data('price');
        var option_name = $selected.data('name');
        var option_text = $selected.text();
//옵션 리스트에 추가
        $list =$("#added_option_list");

        var option_item = document.createElement("div");
        option_item.setAttribute("class","optionItem field");
        option_item.setAttribute("data-price",option_price);
        $option_item = $(option_item);
        $list.append(option_item);
    //히든태그추가 시작
        var input = document.createElement("input");
        input.setAttribute("type","hidden");
        input.setAttribute("value",option_id);
        input.setAttribute("data-price",option_price);
        input.setAttribute("name","options[]");
        $option_item.append(input);
    //히든태그추가 끝
    //옵션추가 시작
        var option = document.createElement("div");
//        option.innerHTML = `<div class="ui header" style="margin-top:20px;">${option_text}</div>`;
        option.innerHTML = "<div class="ui header" style="margin-top:20px;">"+option_text+"</div>"
        $option_item.append(option);
    //옵션추가 끝
        var removeBtn = document.createElement("button");
        removeBtn.setAttribute("type","button");
        removeBtn.setAttribute("class","ui button basic");
        removeBtn.setAttribute("onclick","  $(this).parent('.optionItem').remove();cal_totalPrice();");
        removeBtn.innerHTML = "삭제";
        $option_item.append(removeBtn);
//옵션 리스트에 추가 끝

//총금액 변경
        cal_totalPrice();
        // g_totalPrice  += option_price;
        // $("#total_price").text(g_totalPrice.toLocaleString('en'));
    
    });

//싱글룸 변경시 총금액 변경
    $("select[name=singleroom]").change(function(){
        // var $this =$(this);
        // var price = $this.find("option:selected").data('price');
        // console.log(price);
        // g_totalPrice  += price;
        // $("#total_price").text(g_totalPrice.toLocaleString('en'));

        cal_totalPrice();
    });
    //홀추가 옵션 변경시 총금액 변경
    $("select[name=hole_option]").change(function(){
        console.log(1);        
        cal_totalPrice();
    });

   
});

   



IMP.init('<?=$imp_franchises_code?>'); // 아임포트 관리자 페이지의 "시스템 설정" > "내 정보" 에서 확인 가능


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
    var totalPrice =$("input[name=total_price]").val();
    $form =$(e);
    // $form.find("input[name=total_price]").val(g_totalPrice);
    var pay_method = $form.find("select[name=pay_method] option:selected").val();
    var merchant_uid = 'merchant_' + new Date().getTime(); //고유주문번호 merchant_uid
    // console.log(merchant_uid);
    $form.find("input[name=merchant_uid]").val(merchant_uid);
    var name = $form.find("input[name=user_name]").val(); //유저정보
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
            // console.log(data);
            // return;
            if(data.is_check === false)
            {
                alert("정상적인 경로로 이용해주세요");
                return false;
            }
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
                        // console.log(data);
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

