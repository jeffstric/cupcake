
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
            <?if( $pagenum>0 && isset($pagelist_url)):?>
            <div class="pagelist">
                <?if(isset($page) && $page> 0 ):?>
                    <?fb($page)?><?fb($pagenum)?>
                    <a href="<?=site_url($pagelist_url.($page-1) )?>">上一页</a>
                <?endif;?>
                <?for($i=0;$i<$pagenum;$i++):?>
                    <a href="<?=site_url($pagelist_url.$i)?>"><b><?=($i+1)?></b></a>
                <?endfor;?>
                <?if(isset($page) && $page< ($pagenum-1) ):?>
                    <a href="<?=site_url($pagelist_url.($page+1) )?>">下一页</a>
                <?endif;?>
            </div>
            <?endif;?>
        </div>
    </div>
  	