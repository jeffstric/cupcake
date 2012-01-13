<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Image
 *
 * Generates an <img /> element
 *
 * @access	public
 * @param	mixed
 * @return	string
 */
if ( ! function_exists('img'))
{
	function img($src = '', $index_page = FALSE)
	{
		if ( ! is_array($src) )
		{
			$src = array('src' => $src);
		}

		// If there is no alt attribute defined, set it to an empty string
		if ( ! isset($src['alt']))
		{
			$src['alt'] = '';
		}

		$img = '<img';

		foreach ($src as $k=>$v)
		{

			if ($k == 'src' AND strpos($v, '://') === FALSE)
			{
				$CI =& get_instance();

				if ($index_page === TRUE)
				{
					$img .= ' src="'.$CI->config->site_url($v).'"';
				}
				else
				{
					$img .= ' src="'.$CI->config->slash_item('base_url').$v.'"';
				}
			}
			else
			{
				$img .= " $k=\"$v\"";
			}
		}

		$img .= '/>';

		return $img;
	}
}

/**
 * author : cnbb.com.cn
 */
function get_flash($name = 'flash'){
    $CI = &get_instance();
    $CI->load->model('adsence_style_model');
    $result = $CI->adsence_style_model->get_adsence($name);
    $html ='<div id="bigp"><div class="bigpin"><div id="gallery"><div id="slides">';
    foreach($result as $value){
                       $html.=' <div class="slide"><a href="'.$value->url.'" target="_blank"><img src="'.
                               get_U($value->img).'" alt="'.$value->name.'" /></a></div>';
    }
    $html.='</div><div id="flash_menu"><ul><li class="fbar">&nbsp;</li>';
    $num = $CI->adsence_style_model->count_adsence($name);
    for($i = 0 ; $i < $num ; $i++){
        $html.='<li class="menuItem"><a href=""><img src="'.get_cji('thumb_about.png').'"/></a></li>';
    }
    $html.='</ul></div></div></div></div>';
    return $html;
}
function get_ad($name){
    $CI = &get_instance();
    $CI->load->model('adsence_style_model');
    $result = array_pop($CI->adsence_style_model->get_adsence($name));
    $html='<li><a href="'.$result->url.'"><img src="'.get_U($result->img).'" alt="'.$result->name.'" /></a></li>';
    return $html;
}


/* End of file html_helper.php */
/* Location: ./system/helpers/html_helper.php */