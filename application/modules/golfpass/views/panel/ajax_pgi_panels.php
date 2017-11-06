<article id='panel-box' class="row col-12">

    <?php for($i=0; $i< count($panels);$i++){?>
    <div class="col-6 col-md-3 panel">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="<?=$panels[$i]->photo?>" class="rounded-circle" alt="" style="width: 140px;">
            <div class="panel-content text-center">
                <p><?=$panels[$i]->name?></p>
                <p class="intro"><?=$panels[$i]->intro?></p>
            </div>
        </div>
    </div>
    <?php }?>
  
</article>

<div class="col-12 d-flex justify-content-center align-items-center pagination">
    <?php echo $this->ajax_pgi_1->create_links(); ?>
    <!-- <div class="prev"><a href="#"><i class="xi xi-angle-left-min"></i></a></div>
    <ul class="d-flex list-unstyled justify-content-center">
        <li class="current"><a href="#">01</a></li>
        <li><a href="#">02</a></li>
        <li><a href="#">03</a></li>
        <li><a href="#">04</a></li>
    </ul>
    <div class="next"><a href="#"><i class="xi xi-angle-right-min"></i></a></div> -->
</div>
