

<table class="ui selectable table">
    <tr>
        <td>번호</td>
        <td>이름</td>
        <td>폰</td>
        <td>신청일</td>
    </tr>
    <?php foreach ($rows as $row ): ?>

    <tr>
        <td><a href="<?=my_site_url("/admin/hope_travel/get/{$row->id}")?>"><?=$row->id?></a></td>
        <td><a href="<?=my_site_url("/admin/hope_travel/get/{$row->id}")?>"><?=$row->name?></a></td>
        <td><a href="<?=my_site_url("/admin/hope_travel/get/{$row->id}")?>"><?=$row->phone?></a></td>
        <td><?=$row->created?></td>
       
    </tr>
    <?php endforeach; ?>
</table>



<form class="ui form" style="margin-top:30px;" class="" action="<?=my_site_url("/admin/hope_travel/list")?>" method="get">
    <div class="fields">
        <div class="field">
            <select name="field" id="">
                <option value="h_t.name" <?=my_set_selected(null, 'field', 'h_t.name')?>>주문자이름</option>
                <option value="h_t.phone" <?=my_set_selected(null, 'field', 'h_t.phone')?>>연락처</option>
            </select>
        </div>
        <div class="field">
            <input type="text" name="value" value="<?=my_set_value('value','POST')?>">
        </div>
        <input class="ui button basic" type="submit" value="검색">
    </div>
    <input type="hidden" name="menu_name" value="<?=$this->input->get("menu_name")?>">
    <input type="hidden" name="sub_name" value="<?=$this->input->get("sub_name")?>">
</form>





<div class="ui centered grid container">
    <div class="row">
        <?= $this->pagination->create_links();?>

    </div>
</div>

