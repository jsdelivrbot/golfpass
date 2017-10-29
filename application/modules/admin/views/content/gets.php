<table>
    <tr>
        <td>제목</td>
        <td>날짜</td>
        <td>옵션</td>
        
    </tr>
    
<?php for($i=0 ;$i <count($contents); $i++){?>
    <tr>
    <td><a href="<?=my_site_url(admin_content_uri."/update/{$contents[$i]->id}")?>"><?=$contents[$i]->title?></a> </td>
    <td> <?=$contents[$i]->created?></td>
    <td><a onclick="confirm_redirect('<?=my_site_url(admin_content_uri."/delete/{$contents[$i]->id}")?>','정말 삭제하시겠습니까? 복구 할 방법이 없습니다.')" href="#">삭제</a></td>
    </tr>       
<?php }?>

</table>