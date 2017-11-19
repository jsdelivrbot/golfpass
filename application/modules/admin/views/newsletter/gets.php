
<table class="ui selectable table">
    <thead>
        <tr>
            <th>아이디</th>
            <th>이메일</th>
            <th>날자</th>
        </tr>
    </thead>
    <tbody>
<?php for($i=0 ; $i<count($rows) ; $i++){?>
    <tr>
        <td class=""><?=$rows[$i]->id?></td>
        <td class=""><?=$rows[$i]->email?></td>
        <td class=""><?=$rows[$i]->created?></td>
        
    </tr>
<?php }?>
    </tbody>
</table>


