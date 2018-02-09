<div style="margin-top: -150px;">
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

<!-- StyleSheets -->
<link rel="stylesheet" href="/public/etc/order/css/ionicons.min.css">
<link rel="stylesheet" href="/public/etc/order/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/public/etc/order/css/font-awesome.min.css">
<link rel="stylesheet" href="/public/etc/order/css/main.css">
<link rel="stylesheet" href="/public/etc/order/css/style.css">
<link rel="stylesheet" href="/public/etc/order/css/responsive.css">
<style>
    /* 헤더고정 */
    #tp-md-nav{
        position : fixed !important;
    }
    /* 셀렉트폼 */
    .j-select{
        /* -webkit-appearance: button; */
        /* background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5); */
   /* background-position: 97% center; */
   /* background-repeat: no-repeat; */
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   border: 1px solid #AAA;
   color: #333;
   font-size: 15px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 100%;
   margin:10px;
    }
    /* 셀렉트폼 위에 라벨 */
    .j-label{
        font-size : 15px !important;
    }
</style>

<!-- COLORS -->
<link rel="stylesheet" id="color" href="/public/etc/order/css/default.css">

<!-- JavaScripts -->
<script src="js/vendors/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Page Wrapper -->
<div id="wrap"> 
  <!-- Content -->
  <div id="content">
    <!-- SHOP --> 
    <!--======= PAGES INNER =========-->
    <section class="padding-top-80 padding-bottom-80 pages-in chart-page">
      <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
          
          <!-- SHOPPING INFORMATION -->
          <div class="cart-ship-info">
            <form id="form_order" onsubmit="alert_payment_window(this); return false;"  action="<?=site_url(shop_order_uri."/golfpass_ajax_add")?>"method ="post">
                <input type="hidden" name="product_id" value="<?=$product_id?>">
                <input type="hidden" name="merchant_uid">
                <input type="hidden" name="start_date" value="<?=$start_date?>">
                <input type="hidden" name="end_date" value="<?=$end_date?>">
                <input type="hidden" name="num_people" value="<?=$num_people?>">
                <input type="hidden" name="total_price" value="<?=$total_price?>">
                <input type="hidden" name="order_name" value="<?=$product->name?>">
            <div class="row"> 
              
              <!-- ESTIMATE SHIPPING & TAX -->
            <div class="col-sm-5">
                <div class="order-place">
                  <h5 style="color:#79b754 !important;">가격 정보</h5>
                  <div class="order-detail">
                    <p style="font-size:14px;"><?=$product->name?>   <span> 
                         &nbsp;<span id="total_price"></span></span></p>
                    <p style="font-size:12px;">&nbsp;   <span> 
                         &nbsp;<span style="color:#bc7a8f; font-weight:bold;" id="total_price">X&nbsp;<?=number_format($num_people)?></span></span>     
                    &nbsp;   <span> 
                         인당&nbsp;<span id="total_price"><?=number_format($total_price/$num_people)?>원</span></span></p>
                    <p style="font-size:14px;">&nbsp;  <span> 
                         총&nbsp;<span style="font-weight: bold;" id="total_price"><?=number_format($total_price)?>원</span></span></p>
                                        <div class="item-order">
                    
                    </div>
                  </div>
                  <div class="pay-meth">
                    <h5 class="text-color-primary" style="color:#79b754 !important;">옵션 선택</h5>
                    <ul style="padding:0;">
                    <?php if ( isset($options[0]) ): ?>
                      <li>
                        <div class="checkbox">
                          <input id="checkbox3-1" class="styled" type="checkbox" name="options[]" value="<?=$options[0]->id?>" data-price ="<?=$caddy_price?>">
                          <label for="checkbox3-1" class="j-label"> 캐디 플레이</label>
                        </div>
                      </li>
                    <?php endif; ?>
                      <?php if ( isset($hotel)): ?>
                      <li>
                        <!-- <div class="checkbox">
                          <input id="checkbox3-2" class="styled" type="checkbox"> -->
                          <label for="checkbox3-2" class="j-label"> 싱글 룸 차지 </label>
                              <select name="singleroom" class="j-select" style="margin:10px 0 10px 0;">
                                  <option value="" data-price="0">선택 안함</option>
                                <?php foreach ( $singlerooms as $singleroom ): ?>
                                <option value="<?=$singleroom->value?>" data-price="<?=$singleroom->price?>">
                                <?="{$singleroom->value}인( + ".number_format($singleroom->price)."원)"?></option>
                                <?php endforeach; ?>


                                
                              </select>
                        <!-- </div> -->
                      </li>
                      <?php endif; ?>
                      <li>
                        <!-- <div class="checkbox">
                          <input id="checkbox3-3" class="styled" type="checkbox"> -->
                          <label for="checkbox3-3" class="j-label"> 희망 시간대 </label>
                            <select name="hope_date" class="j-select" style="margin:10px 0 10px 0;">
                              <option value="상관없음">상관없음</option>
                              <option value="7시대">* 7시대</option>
                              <option value="8시대">* 8시대</option>
                              <option value="9시대">* 9시대</option>
                              <option value="10시대">* 10시대</option>
                              <option value="11시대">* 11시대</option>
                              <option value="오후플레이">* 오후 플레이</option>
                            </select>
                        <!-- </div> -->
                      </li>
                      </ul> </div>
                  <div class="pay-meth margin-top-40">
                          <label class="j-label" > 결제 수단
                              <select class="j-select" name="pay_method" style="margin:10px 0 10px 0;">
                                  <option value="bank">무통장 입금</option>
                                  <option value="card">신용 카드</option>
                                  <option value="trans">실시간 계좌 이체</option>
                                  <option value="vbank">가상 계좌</option>
                                  <option value="samsung">삼성 페이</option>
                                  <option value="kpay">KPay 앱 직접 호출</option>
                              </select>
                          </label>
                    <a id="order_submit_btn"href="#" class="btn btn-small btn-dark pull-right" style="background-color:#79b754 !important;">결제하기</a> </div>
                    
                </div>
              </div>
              <div class="col-sm-7">
                 
                <h5 class="font-20px margin-bottom-30">주문자 정보</h5>
                <div class="margin-bottom-50">
                  <ul class="row" style="padding:0;">
                    <li class="col-md-6">
                      <label> 이름
                        <input type="text"  name="user_name" value="<?=set_value_data($user,'name')?>" >
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label> 영문 이름
                        <input type="text"  name="user_eng_name" value="<?=set_value_data($user,'user_eng_name')?>" >
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label> 연락처
                        <input type="text"name="phone" value="<?=set_value_data($user,'phone')?>">
                      </label>
                    </li>
                    <li class="col-md-6">
                      <label> E-mail
                        <input type="text" name="email" value="<?=set_value_data($user,'email')?>">
                      </label>
                    </li>
                </ul>
              </div>
            <h5 class="font-20px margin-bottom-15" style="display:none;">동행자 정보 (<?=$num_people?>명)</h5>
            <h5 class="font-14px margin-bottom-30"  style="display:none;">동행자 정보는 추후에 입력하셔도 됩니다.</h5>
            <?php for ( $i = 0 ; $i < count($groups) ; $i++ ): ?>
                <input type="hidden" name="groups[]" value="<?=$groups[$i]?>"  style="display:none;">
                <h5 class="font-14px margin-bottom-30 letter-space-2" style="color:#79b754 !important; display:none;"><?=chr(65+$i)?>조</h5>
                <div>
                <?php for ($j = 0 ; $j < (int)$groups[$i] ; $j++ ): ?>
                    <ul class="row margin-bottom-20" style="border-bottom: 2px solid #ececec; padding:0; display:none;">
                        <li class="col-md-6">
                        <label> 이름
                            <input type="text" name="name_with[]" placeholder="">
                        </label>
                        </li>
                        <li class="col-md-6">
                        <label> 영문 이름
                            <input type="text" name="eng_name_with[]" placeholder="">
                        </label>
                        </li>
                        <li class="col-md-6">
                        <label> 연락처
                            <input type="text" name="phone_with[]" placeholder="">
                        </label>
                        </li>
                        <li class="col-md-6">
                        <label> E-mail
                            <input type="text" name="email_with[]" placeholder="">
                        </label>
                        </li>
                    </ul>

                    
                <?php endfor; ?>
                </div>
            <?php endfor; ?>
          </div>
              
              <!-- SUB TOTAL -->
              
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- End Content --> 
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="/public/etc/order/js/vendors/jquery/jquery.min.js"></script> 
<script src="/public/etc/order/js/vendors/wow.min.js"></script> 
<script src="/public/etc/order/js/vendors/bootstrap.min.js"></script> 
<script src="/public/etc/order/js/vendors/own-menu.js"></script> 
<script src="/public/etc/order/js/vendors/flexslider/jquery.flexslider-min.js"></script> 
<script src="/public/etc/order/js/vendors/jquery.countTo.js"></script> 
<script src="/public/etc/order/js/vendors/jquery.isotope.min.js"></script> 
<script src="/public/etc/order/js/vendors/jquery.bxslider.min.js"></script> 
<script src="/public/etc/order/js/vendors/owl.carousel.min.js"></script> 
<script src="/public/etc/order/js/vendors/jquery.sticky.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="/public/etc/order/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="/public/etc/order/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script src="/public/etc/order/js/zap.js"></script>

<script src="https://service.iamport.kr/js/iamport.payment-1.1.5.js" type="text/javascript"></script>


<script>
    IMP.init('<?=$imp_franchises_code?>'); // 아임포트 관리자 페이지의 "시스템 설정" > "내 정보" 에서 확인 가능
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
                $("#total_price").text(total_price.toLocaleString('en')+"원");
                $("input[name=total_price]").val(total_price);
            }
        });
    }

    let $inputSingleroom =$("select[name=singleroom]");
    let $inputOptions = $("input[name='options[]']");
    let $wrapperItemList = $(".item-order");
    /**
     * 옵션element를 만들어 반환합니다.
     * 
     * @return jquery element
     */
    function createOption(category,name, price)
    {
       let $p = $(`<p>${category} : ${name}</p>`);
        price  = price.toLocaleString();
        let $span= $(`<span class="color"> + ${price} 원</span>`);
        $p.append($span);
        return $p;
    }
   
    function renderOptionlist()
    {
        $wrapperItemList.children().remove();

      
        var $selectedSingleoom = $inputSingleroom.find(":selected");
        if($selectedSingleoom.val() !== "" && typeof $selectedSingleoom.val() !== "undefined" )
        {
            var price = $selectedSingleoom.data("price");
            var $option = createOption("옵션","싱글 룸 차지",parseInt(price));
            $wrapperItemList.prepend($option);
        }
        if(typeof $inputOptions[0] !== "undefined" )
        {
            if( $inputOptions[0].checked === true)
            {
                var price = $($inputOptions[0]).data("price");
                var $option =createOption("옵션","캐디 플레이",parseInt(price));
                $wrapperItemList.prepend($option);
            }
    
        }
      
    }
    //싱글룸 변경시 총금액 변경
    $inputSingleroom.change(function(){
        cal_totalPrice();
        renderOptionlist();
    });
    //캐디 변경시 총금액 변경
    $inputOptions.click(function(){
        cal_totalPrice();
        renderOptionlist();
    });
    
    let $order_btn = $("#order_submit_btn");
    $order_btn.click(function()
    {
        $form.submit();
        return false;
    });


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

