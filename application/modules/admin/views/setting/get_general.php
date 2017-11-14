<div class="sixteen wide column" style="margin-top:50px;">
    
<h1 class="ui horizontal divider header">
<i class="plus icon"></i>
    기본설정
    </h1>
    <!-- <label>상품 후기 자동 보이기</label> -->
    <form class="ui form"onsubmit="ajax_submit(this);return false;"action="<?=site_url(admin_setting_product_uri."/ajax_update")?>" method="post">
        <div class="field">
            <label>구글 지도 API 키</label>
            <input type="text" name="google_map_api_key" placeholder="apikey" value="<?=set_value_data($row,'google_map_api_key')?>" >
        </div>

    <input class="ui button positive" type="submit" value="수정">
    </form>
</div>
