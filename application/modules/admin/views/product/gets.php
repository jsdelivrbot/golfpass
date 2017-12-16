<table class="ui selectable table">
    <thead>
        <tr>
            <th>아이디</th>
            <th>이름</th>
            <th>설명</th>
            <th>카테고리</th>
            <th>수정/삭제</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0 ; $i<count($products) ; $i++){?>
        <tr>
            <td class="selectable">
                <a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>">
                    <?=$products[$i]->id?>
                </a>
            </td>
            <td class="selectable">
                <a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>">
                    <?=$products[$i]->name?>
                </a>
            </td>
            <td class="selectable">
                <a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>">
                    <?=$products[$i]->desc?>
                </a>
            </td>
            <td class="selectable">
                <a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>">
                    <?=$products[$i]->cate_name?>
                </a>
            </td>
            <!-- <td><?=$products[$i]->category_id?> </td> -->
            <!-- <td><?=$products[$i]->c_name?> </td> -->
            <td>
                <a href="<?=my_site_url(admin_product_uri."/update/{$products[$i]->id}")?>">수정</a>
                /
                <a onclick="confirm_redirect('<?=my_site_url(admin_product_uri."/delete/{$products[$i]->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a>
            </td>

        </tr>
        <?php }?>
    </tbody>
</table>
<a class="ui button basic positive" href="<?=my_site_url(admin_product_uri.'/add')?>">상품추가</a>

<form class="ui form" style="margin-top:30px;" class="" action="<?=my_site_url(admin_product_uri."/gets")?>" method="post">
    <div class="fields">
        <div class="field">
            <select name="field" id="">
                <option value="name" <?=my_set_selected(null, 'field', 'name')?>>상품명</option>
                <option value="desc" <?=my_set_selected(null, 'field', 'desc')?>>상품설명</option>
            </select>
        </div>
        <div class="field">
            <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
        </div>
        <input class="ui button basic" type="submit" value="검색">
    </div>
</form>
<div class="ui centered grid container">
    <div clas="row">
        <?= $this->pagination->create_links();?>

    </div>

</div>