<html><head>

        <title>DedeCms menu</title>
        <link type="text/css" href="<?= admin_cji('menu.css') ?>" rel="stylesheet">
        <link type="text/css" href="<?= admin_cji('base.css') ?>" rel="stylesheet">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    </head>
    <body  target="main">
        <table cellspacing="0" cellpadding="0" border="0" align="left" width="180">
            <tbody>
                <tr>
                    <td width="20" valign="top" style="padding-top: 10px;">
                        <a class="mmac" id="link1"><div>商品</div></a>

                        <div class="mmf"></div>
                    </td>
                    <td width="160" valign="top" id="mainct">
                        <div id="ct1">
                            <!-- Item 2 Strat -->
                            <dl class="bitem"><dt><b>商品管理</b></dt>
                                <dd id="items1_1" class="sitem" style="display: block;">
                                    <ul class="sitemu">
                                        <li><a target="main" href="<?=site_url('admin/product_add')?>">商品添加</a>
                                        </li>
                                        <li><a target="main" href="<?=site_url('admin/product_manage')?>">商品浏览与管理</a>
                                        </li>
                                        <li><a target="main" href="<?=site_url('admin/category_add')?>">分类添加</a>
                                        </li>
                                        <li><a target="main" href="<?=site_url('admin/category_manage')?>">分类浏览与管理</a>
                                        </li>
                                    </ul>
                                </dd>
                            </dl>
                            <!-- Item 2 End -->
                        </div>

                    </td>
                </tr>

                <tr>
                    <td width="26"></td>
                    <td width="160" valign="top"><img src="<?= admin_cji('idnbgfoot.gif') ?>"></td>
                </tr>
                <tr>
                    <td width="20" valign="top" style="padding-top: 10px;">
                        <a class="mmac" id="link1"><div>广告</div></a>

                        <div class="mmf"></div>
                    </td>
                    <td width="160" valign="top" id="mainct">
                        <div id="ct1">
                            <!-- Item 2 Strat -->
                            <dl class="bitem"><dt><b>广告管理</b></dt>
                                <dd id="items1_1" class="sitem" style="display: block;">
                                    <ul class="sitemu">
                                        <li><a target="main" href="<?=site_url('admin/adsence_add')?>">广告添加</a>
                                        </li>
                                        <li><a target="main" href="<?=site_url('admin/adsence_manage')?>">广告浏览与管理</a>
                                        </li>
                                        <li><a target="main" href="<?=site_url('admin/adsence_style_add')?>">广告位添加</a>
                                        </li>
                                        <li><a target="main" href="<?=site_url('admin/adsence_style_manage')?>">广告位浏览与管理</a>
                                        </li>
                                    </ul>
                                </dd>
                            </dl>
                            <!-- Item 2 End -->
                        </div>

                    </td>
                </tr>


            </tbody></table>
    </body></html>