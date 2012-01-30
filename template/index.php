	
    <?=get_flash()?>

    <div class="container">
        <ul class="banner300">
            <?=get_ad('global_ad1')?>
            <?=get_ad('global_ad2')?>
            <?=get_ad('global_ad3')?>
        </ul>
        <div id="columnLeft">
            <div class="infoBoxHeading"><img src="<?=get_cji('lcate.gif')?>" /></div>
            <div class="infoBoxContents">
            	<ul>
                    <?if(isset($category) &&count($category)>0):?>
                      <?foreach($category as $value):?> 
                        <li><a href="<?=$value['url']?>"><?=$value['name']?></a></li>
                      <?endforeach;?>
                    <?endif;?>
                </ul>
            </div>
        </div>
        <div id="bodyContent">
        	<ul>
                    <?if(count($Iproduct)>0):?>
                    <?foreach($Iproduct as $value):?>
                        <li>
                            <div>
                                <a href="<?=$value['url']?>"><img src="<?=get_U($value['tmb'])?>" /></a>
                                <h4><?=$value['name']?></h4>
                                <p id="des_p"><?=strip_tags($value['des'])?></p>
                                <a href="<?=$value['url']?>" class="more">查看详细>></a>
                            </div>
                        </li>
                    <?endforeach;?>
                    <?endif;?>
                </ul>
        </div>
    </div>