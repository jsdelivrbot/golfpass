<div class="sixteen wide column" style="margin-top:50px;">
    
<h1 class="ui horizontal divider header">
<i class="plus icon"></i>
    기본설정
    </h1>
    <!-- <label>상품 후기 자동 보이기</label> -->
    <form class="ui form"onsubmit="ajax_submit(this);return false;"action="<?=site_url(admin_setting_product_uri."/ajax_update")?>" method="post">
        <div class="field">
            <label>CAFE24 SMS API 키</label>
            <input type="text" name="cafe24_sms_api_key" placeholder="apikey" value="<?=set_value_data($row,'cafe24_sms_api_key')?>" >
        </div>
        <div class="field">
            <label>CAFE24 SMS 발송 휴대폰 번호</label>
            <input type="text" name="cafe24_sms_number" placeholder="apikey" value="<?=set_value_data($row,'cafe24_sms_number')?>" >
        </div>

    <input class="ui button positive" type="submit" value="수정">
    </form>
</div>
