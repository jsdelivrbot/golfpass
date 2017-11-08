

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<!-- <script src="/public/framework/semantic/src/less.min.js"></script> -->

<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($rows); $i++){?>
    <tr>
    <td><?=$rows[$i]->name?></td>
    <td><a href="<?=$rows[$i]->url?>"><?=$rows[$i]->url?></a></td>
    <td><?=$rows[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>