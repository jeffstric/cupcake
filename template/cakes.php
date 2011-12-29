
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
            <h2>所有商品</h2>
            <ul>
                <?if(($products)!=NULL):?>
                    <?foreach($products as $value):?>
                        <li>
                            <div>
                                <a href="<?=$value['url']?>"><img src="<?=get_U($value['tmb'])?>" /></a>
                                <h4><?=$value['name']?></h4>
                                <p id="des_p"><?=$value['des']?></p>
                                <a href="<?=$value['url']?>" class="more">查看详细>></a>
                            </div>
                        </li>
                    <?endforeach;?>
                  <?endif;?>
            </ul>
            <div class="pagelist"><a href="#"><b>1</b></a><a href="#">2</a><a href="#">下一页</a></div>
        </div>
    </div>
  	