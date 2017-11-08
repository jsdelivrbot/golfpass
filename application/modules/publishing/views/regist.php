<!-- <link rel="stylesheet/less" type="text/css" href="/public/framework/semantic/src/semantic.less"> -->
<!-- <link rel="stylesheet" type="text/css" href="/public/framework/semantic/out/semantic.css"> -->

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<!-- <script src="/public/framework/semantic/src/less.min.js"></script> -->

<style>
.column {
  max-width: 450px;
}



</style>

<div style="margin-top:120px;"></div>
<div class="ui middle aligned center aligned grid">
<div class="column">
<form class="ui large form ">
<!-- <div class="ui header">회원가입</div>  -->

<div class="ui small image">
  <img src="https://semantic-ui.com/images/wireframe/image.png">
</div>
<div style="margin-top:15px;"></div>
      <div class="field">
          <input type="text" name="userName" placeholder="아이디">
      </div>
      <div class="field">
          <input type="password" name="password" placeholder="비밀번호">
      </div>
      <div class="field">
          <input type="password" name="password" placeholder="비밀번호 확인">
      </div>


      <div class="field">
          <input type="text" name="userName" placeholder="이름">
      </div>


      <div class="field">
          <input type="text" name="userName" placeholder="생년월일">
      </div>


      <div class="field">
          <input type="text" name="userName" placeholder="휴대폰번호">
      </div>
      <div class="field">
          <input type="text" name="userName" placeholder="이메일">
      </div>
      <div class="field">
          <input type="text" name="userName" placeholder="주소">
      </div>
      
  

            
<!-- <div class="ui sub header">구력</div> -->
<select name="skills" class="ui fluid search dropdown">
  <option value="">구력</option>
  <option value="30년 이상">30년 이상</option>
<option value="20~29년">20~29년</option>
<option value="15~19년">15~19년</option>
<option value="10~15년">10~15년</option>
<option value="5~9년">5~9년</option>
<option value="0~4년">0~4년</option>
</select>
<!-- <div class="ui sub header">평균스코어</div> -->
<div style="margin-top:15px;"></div>
<select name="avg_score" class="ui fluid search dropdown">
  <option value="">프로</option>
<option value="angular">싱글</option>
<option value="css">~90</option>
<option value="design">91~100</option>
<option value="ember">100~120</option>
<option value="html">입문자</option>
</select>
<div style="margin-top:15px;"></div>
<!-- <div class="ui sub header">해외 골프시 선호하는 국가(복수선택 가능)</div> -->
<div class="ui fluid multiple search selection dropdown">
  <input name="tags" type="hidden">
  <i class="dropdown icon"></i>
  <div class="default text">해외 골프시 선호하는 국가(복수선택 가능)</div>
  <div class="menu">
    <div class="item" data-value="일본">일본</div>
<div class="item" data-value="태국">태국</div>
<div class="item" data-value="필리핀">필리핀</div>
<div class="item" data-value="중국">중국</div>
<div class="item" data-value="말레이시아">말레이시아</div>
<div class="item" data-value="미국">미국</div>
<div class="item" data-value="유럽">유럽</div>
<div class="item" data-value="사이판/괌">사이판/괌</div>
<div class="item" data-value="기타">기타</div>
  </div>
</div>
<div style="margin-top:15px;"></div>
<!-- <div class="ui sub header">해외 골프시 자주가본 국가(복수선택 가능)</div> -->
<div class="ui fluid multiple search selection dropdown">
  <input name="tags" type="hidden">
  <i class="dropdown icon"></i>
  <div class="default text">해외 골프시 자주가본 국가(복수선택 가능)</div>
  <div class="menu">
    <div class="item" data-value="일본">일본</div>
<div class="item" data-value="태국">태국</div>
<div class="item" data-value="필리핀">필리핀</div>
<div class="item" data-value="중국">중국</div>
<div class="item" data-value="말레이시아">말레이시아</div>
<div class="item" data-value="미국">미국</div>
<div class="item" data-value="유럽">유럽</div>
<div class="item" data-value="사이판/괌">사이판/괌</div>
<div class="item" data-value="기타">기타</div>
  </div>
</div>

<div style="margin-top:15px;"></div>

<!-- <div class="ui sub header">해외 골프시 향후 가보고 싶은국가(복수선택 가능)</div> -->
<div class="ui fluid multiple search selection dropdown">
  <input name="tags" type="hidden">
  <i class="dropdown icon"></i>
  <div class="default text">해외 골프시 향후 가보고 싶은국가(복수선택 가능)</div>
  <div class="menu">
    <div class="item" data-value="일본">일본</div>
<div class="item" data-value="태국">태국</div>
<div class="item" data-value="필리핀">필리핀</div>
<div class="item" data-value="중국">중국</div>
<div class="item" data-value="말레이시아">말레이시아</div>
<div class="item" data-value="미국">미국</div>
<div class="item" data-value="유럽">유럽</div>
<div class="item" data-value="사이판/괌">사이판/괌</div>
<div class="item" data-value="기타">기타</div>
  </div>
</div>



      <input type="submit"class="ui fluid positive basic button" value="회원가입" style="margin-top:10px;"></input>
     

    <div class="ui error message"></div>


 
   
</form>
  </div>

</div>


<div style="margin-bottom:120px;"></div>

<script>
$('.ui.dropdown')
.dropdown({
  allowAdditions: true
})
;

</script>