
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
            <h2>所有商品</h2>
            <ul>
                <?if(($products)!=NULL):?>
                    <?foreach($products as $value):?>
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
            <?if( $pagenum>0 && isset($pagelist_url)):?>
            <div class="pagelist">
                <?if(isset($page) && $page> 1 ):?>
                    <a href="<?=site_url($pagelist_url.($page-1) )?>">上一页</a>
                <?endif;?>
                <?for($i=1;$i<=$pagenum;$i++):?>
                    <a href="<?=site_url($pagelist_url.$i)?>"><b><?=$i?></b></a>
                <?endfor;?>
                <?if(isset($page) && $page< ($pagenum) ):?>
                    <a href="<?=site_url($pagelist_url.($page+1) )?>">下一页</a>
                <?endif;?>
            </div>
            <?endif;?>
        </div>
    </div>
  	