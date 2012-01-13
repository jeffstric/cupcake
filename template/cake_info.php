
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
            <?=get_ad('global_ad1')?>
            <?=get_ad('global_ad2')?>
            <?=get_ad('global_ad3')?>
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
        	<h2><?=$product['name']?></h2>
            <div class="pinfo">
        		<div class="probigp"><img src="<?=get_U($product['img'])?>" /></div>
            	<div class="ptext">
                    <h4><?=$product['name']?></h4>
                    <p class="text_p">
                        <?=$product['des']?>
                    </p>
                </div>
            </div>
        </div>
    </div>
  