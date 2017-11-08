

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<!-- <script src="/public/framework/semantic/src/less.min.js"></script> -->

<div class="ui header">base</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($base); $i++){?>
    <tr>
    <td><?=$base[$i]->name?></td>
    <td><a href="<?=$base[$i]->url?>"><?=$base[$i]->url?></a></td>
    <td><?=$base[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>
<div class="ui header">shop</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($shop); $i++){?>
    <tr>
    <td><?=$shop[$i]->name?></td>
    <td><a href="<?=$shop[$i]->url?>"><?=$shop[$i]->url?></a></td>
    <td><?=$shop[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>
<div class="ui header">etc</div>
<table class="ui table ">
<tr>
    <td>이름</td>
    <td>url</td>
    <td>view_dir</td>
</tr>
<?php for($i=0; $i < count($etc); $i++){?>
    <tr>
    <td><?=$etc[$i]->name?></td>
    <td><a href="<?=$etc[$i]->url?>"><?=$etc[$i]->url?></a></td>
    <td><?=$etc[$i]->view_dir?></td>

    </tr>
<?php }?>
</table>