    <div id="bigp">
   	<div class="bigpin">
            <div id="gallery">
	
                <div id="slides">
                    <?if(isset($banner->flash_ad)):?>
                      <?foreach($banner->flash_ad as $value):?>
                        <div class="slide">
                           <a href="<?=$value['url']?>" target="_blank">
                               <img src="<?=get_U($value['img'])?>" alt="<?=$value['name']?>" />
                           </a>
                        </div>
                      <?endforeach;?>
                    <?endif;?>

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
        </div>
    </div>
    <div class="container">
    	<ul class="banner300">
           <?if(isset($banner->global_ad1)):?>
             <li>
              <!--这里的闪现率暂时不予考虑，全部选取第一张图片-->
                <a href="<?=$banner->global_ad1['0']['url']?>">
                   <img src="<?=get_U($banner->global_ad1['0']['img'])?>" alt="<?=$banner->global_ad1['0']['name']?>" />
                </a>
             </li>
           <?endif;?>
           <?if(isset($banner->global_ad2)):?>
             <li>
              <!--这里的闪现率暂时不予考虑，全部选取第一张图片-->
                <a href="<?=$banner->global_ad2['0']['url']?>">
                   <img src="<?=get_U($banner->global_ad2['0']['img'])?>" alt="<?=$banner->global_ad2['0']['name']?>" />
                </a>
             </li>
           <?endif;?>
           <?if(isset($banner->global_ad3)):?>
             <li>
              <!--这里的闪现率暂时不予考虑，全部选取第一张图片-->
                <a href="<?=$banner->global_ad3['0']['url']?>">
                   <img src="<?=get_U($banner->global_ad3['0']['img'])?>" alt="<?=$banner->global_ad3['0']['name']?>" />
                </a>
             </li>
           <?endif;?>
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