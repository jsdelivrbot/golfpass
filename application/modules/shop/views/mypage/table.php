<div class="sixteen wide column">
            <h1 class="ui header"><?=$page_name?></h1>
            <table class="ui green table responsive">
                <thead>
                    <tr>
                    <?php 
                    for($i = 0 ; $i < count($ths) ; $i++)
                        {
                        ?>
                        <th><?=$ths[$i]?></th>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php for($i=0 ; $i < count($rows) ; $i++){?>
                    <tr>
                        <td><?=$rows[$i]->numrow?></td>
                        <?php for($j = 1 ; $j < count($ths) ; $j++){?>
                        <td><?=$rows[$i]->{$ths[$j]}?></td>
                        <?php }?>
                        
                    </tr>
                   
                <?php }?>

                </tbody>
            </table>

        </div>
        <div class="ui one column centered grid">
        <div class="row">
                    <?=$this->pagination->create_links();?>
        </div>

        </div>

        <div class="sixteen wide column">
        <?php if($page_name ==="고객센터"){?>
            <a  href="<?=my_site_url(shop_mypage_uri."/add_contact?board_id=2")?>" class="ui button basic">글쓰기</a>
        <?php }?>   
        </div>