
<!-- 프로필 사진 시작-->
<!-- <iframe id="profilePhoto_upload" src="/index.php/auth/profilePhoto_upload" width="300px" height="200px">
</iframe>    -->
<!-- 프로필 사진 끝 -->

<form action ="<?=my_site_url(admin_user_uri."/{$mode}")?>"method="POST" >
<input type='hidden' name='profilePhoto' value="<?=set_value('profilePhoto')?>"/> <br/>

이름<input placeholder="이름" type="text" name="name" value="<?=set_value_data($user,'name')?>"/> <?=form_error('name',false,false)?>
<br>
 아이디<input placeholder="아이디" type="text" name="userName" value="<?=set_value_data($user,'userName')?>"/>
 <br/>


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
<input type="hidden" name="kind" value="<?=$kind?>">
 
 <br/>
 
 <input type="submit" name="register" />
</form>

<!-- <iframe src="test" frameborder="0" id="test2">
<div id="test">test</div>
</iframe> -->
<!-- 시작 이메일 인증 팝업 스크립트-->
<script text="text/javascript">
function email_auth_popup(){
    var option = "width=400,height=500";
    var email = document.querySelector("input[name=email]");

    console.log(email.value);
    window.open("<?=site_url(user_uri."/email_auth")?>?email="+email.value,'email_auth',option);
   
}
</script>
<!-- 끝 이메일 인증 팝업 스크립트-->

<!-- 시작 우편번호 daum api script -->
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    // 우편번호 찾기 찾기 화면을 넣을 element
    var element_wrap = document.getElementById('address_search_wrap');

    function foldDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_wrap.style.display = 'none';
    }

    function sample3_execDaumPostcode() {
        // 현재 scroll 위치를 저장해놓는다.
        var currentScroll = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
        new daum.Postcode({
            oncomplete: function(data) {
                // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = data.address; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 기본 주소가 도로명 타입일때 조합한다.
                if(data.addressType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample3_postcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('sample3_address').value = fullAddr;

                // iframe을 넣은 element를 안보이게 한다.
                // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                element_wrap.style.display = 'none';

                // 우편번호 찾기 화면이 보이기 이전으로 scroll 위치를 되돌린다.
                document.body.scrollTop = currentScroll;
            },
            // 우편번호 찾기 화면 크기가 조정되었을때 실행할 코드를 작성하는 부분. iframe을 넣은 element의 높이값을 조정한다.
            onresize : function(size) {
                element_wrap.style.height = size.height+'px';
            },
            width : '100%',
            height : '100%',
            theme: {
                bgColor: "#162525", //바탕 배경색
                searchBgColor: "#162525", //검색창 배경색
                contentBgColor: "#162525", //본문 배경색(검색결과,결과없음,첫화면,검색서제스트)
                pageBgColor: "#162525", //페이지 배경색
                textColor: "#FFFFFF", //기본 글자색
                queryTextColor: "#FFFFFF", //검색창 글자색
                //postcodeTextColor: "", //우편번호 글자색
                //emphTextColor: "", //강조 글자색
                outlineColor: "#444444" //테두리
              }
        }).embed(element_wrap);

        // iframe을 넣은 element를 보이게 한다.
        element_wrap.style.display = 'block';
    }

    function test(){
        document.getElementsByClassName('inner_footer')[0].innerHTML ="";
    }
</script>
<!--끝 우편번호 daum api script -->

