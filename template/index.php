    <div id="bigp">
   	<div class="bigpin">
            <div id="gallery">
	
                <div id="slides">

                <div class="slide"><img src="<?=get_cji('bigp1.jpg')?>" alt="side" /></div>
                <div class="slide"><img src="<?=get_cji('bigp1.jpg')?>" alt="side" /></div>
                <div class="slide"><img src="<?=get_cji('bigp1.jpg')?>" alt="side" /></div>
                <div class="slide"><a href="#" target="_blank"><img src="<?=get_cji('bigp1.jpg')?>" alt="side" /></a></div>

                </div>

                <div id="flash_menu">

                <ul>
                    <li class="fbar">&nbsp;</li>
                    <li class="menuItem"><a href=""><img src="<?=get_cji('thumb_about.png')?>" alt="thumbnail" /></a></li>
                    <li class="menuItem"><a href=""><img src="<?=get_cji('thumb_about.png')?>" alt="thumbnail" /></a></li>
                    <li class="menuItem"><a href=""><img src="<?=get_cji('thumb_about.png')?>" alt="thumbnail" /></a></li>
                    <li class="menuItem"><a href=""><img src="<?=get_cji('thumb_about.png')?>" alt="thumbnail" /></a></li>
                </ul>


                </div>

             </div>
           <!--
            <div class="nivo"><a href="#"><img src="<?=get_cji('bigp1.jpg')?>" /></a></div>
            <div class="nivo-control">
                
                <a href="#" class="on">1</a><a href="#">2</a><a href="#">3</a>
            </div>
           -->
        </div>
    </div>
    <div class="container">
        <?php
        /*
        fb($flash_banner,'$flash_banner');
        fb($global_adsence,'$global_adsence');
        fb($Iproduct,'$Iproduct');
         */
        ?>
    	<ul class="banner300">
            <?foreach($global_adsence as $value):?>
                <li><a href="<?=$value['url']?>"><img src="<?=get_U($value['img'])?>" alt="<?=$value['name']?>" /></a></li>
            <?endforeach;?>
        </ul>
        <div id="columnLeft">
        	<div class="infoBoxHeading"><img src="<?=get_cji('lcate.gif')?>" /></div>
            <div class="infoBoxContents">
            	<ul>
                  <?foreach($category as $value):?> 
                    <li><a href="<?=$value['url']?>"><?=$value['name']?></a></li>
                  <?endforeach;?>
                </ul>
            </div>
        </div>
        <div id="bodyContent">
        	<ul>
                    <?foreach($Iproduct as $value):?>
                        <li>
                            <div>
                                <a href="<?=$value['url']?>"><img src="<?=get_U($value['tmb'])?>" /></a>
                                <h4><?=$value['name']?></h4>
                                <p id="des_p"><?=$value['des']?></p>
                                <a href="<?=$value['url']?>" class="more">查看详细>></a>
                            </div>
                        </li>
                    <?endforeach;?>
                </ul>
        </div>
    </div>