<div style="margin-top:50px;"></div>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/public/etc/kimmincastle/blog_detail.css">

<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Lato", sans-serif
    }

    .w3-bar,
    h1,
    button {
        font-family: "Montserrat", sans-serif
    }

    .fa-anchor,
    .fa-coffee {
        font-size: 200px
    }
    
    .w3-twothird p img {
        width: 100% !important;
        height: auto !important;
    }

</style>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container">
        <a href="<?=site_url(content_uri."/update/{$content->id}?board_id=1")?>">수정</a>
        <a onclick="confirm_redirect('<?=site_url(content_uri."/delete/{$content->id}?board_id=1")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a>
        <div class="w3-content">
            <div class="w3-twothird">
                <h1><?=$content->title?></h1>
                <p class="w3-text-grey"><?=$content->desc?></p>
            </div>
        </div>
    </div>

