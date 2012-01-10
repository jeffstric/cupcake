<div class="right">
	<div class="main">
            
            <?if(isset($which)):?>
                <iframe id="main" name="main" frameborder="0" src="<?=site_url('admin/'.$which)?>"></iframe>
            <?else:?>
                <iframe id="main" name="main" frameborder="0" src="<?=site_url('admin/hello')?>"></iframe>
            <?endif;?>
	</div>
</div>