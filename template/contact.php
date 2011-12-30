    <div id="navpath">
    	<div>当前位置：
            <?foreach($nav as $key => $value):?>
              <?if($key < count($nav)-1 ):?>
                <a href="<?=$value['url']?>"><?=$value['name']?></a> >
              <?else:?>
                <a href="<?=$value['url']?>"><?=$value['name']?></a>
              <?endif;?>  
            <?endforeach;?>
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
        	<h2>联系我们</h2>
        	<div class="infobox">
                    <?=$content?>
                </div>
        </div>
    </div>
  	