<?php defined('BASEPATH') OR exit('No direct script access allowed');
//--------- header css js--------//
if(!function_exists('add_style')){
    function add_style($file='',$type=FALSE){
        $str = '';
        $ci = &get_instance();
        if ($type) {
            $add_style  = $ci->config->item('stylesheet');
            if(empty($file))  return;
            if(is_array($file)){
                if(!is_array($file) && count($file) <= 0) return;
                foreach($file AS $item)$add_style[] = $item;
                $ci->config->set_item('stylesheet',$add_style);
            }else{
                $str = $file;
                $add_style[] = $str;
                $ci->config->set_item('stylesheet',$add_style);
            }
        }else{
            $add_style  = $ci->config->item('style_vendors');
            if(empty($file)) return;
            if(is_array($file)){
                if(!is_array($file) && count($file) <= 0) return;
                foreach($file AS $item) $add_style[] = $item;
                $ci->config->set_item('style_vendors',$add_style);
            }else{
                $str = $file;
                $add_style[] = $str;
                $ci->config->set_item('style_vendors',$add_style);
            }
        }
    }
}
//--------- footer js--------//
if(!function_exists('add_script')){
    function add_script($file='',$type=FALSE){
        $str = '';
        $ci = &get_instance();
        if ($type) {
            $add_script = $ci->config->item('header_script');
            if(empty($file)) return;
            if(is_array($file)){
                if(!is_array($file) && count($file) <= 0) return;
                foreach($file AS $item){ $add_script[] = $item; }
                $ci->config->set_item('header_script',$add_script);
            }else{
                $str = $file;
                $add_script[] = $str;
                $ci->config->set_item('header_script',$add_script);
            }
        }else{
            $add_script  = $ci->config->item('footer_script');
            if(empty($file)) return;
            if(is_array($file)){
                if(!is_array($file) && count($file) <= 0) return;
                foreach($file AS $item){ $add_script[] = $item; }
                $ci->config->set_item('footer_script',$add_script);
            }else{
                $str = $file;
                $add_script[] = $str;
                $ci->config->set_item('footer_script',$add_script);
            }
        }
    }
}

//Putting our CSS and JS files together
if(!function_exists('include_header_scripts')){
    function include_header_scripts(){
        $str = '';
        $ci = &get_instance();
        $stylesheet = $ci->config->item('stylesheet');
        $common_css = $ci->config->item('common_css');

        $style_vendors = $ci->config->item('style_vendors');
        $header_script = $ci->config->item('header_script');
        $script_vendors  = $ci->config->item('script_vendors');

        if ($style_vendors) {
            foreach($style_vendors AS $item){
                if ($item) {
                    $str .= '<link rel="stylesheet" href="'.$item.'.css" type="text/css"/>'."\n";
                }
            }
        }

        if ($stylesheet) {
            foreach($stylesheet AS $item){
                if ($item) {
                    $str .= '<link rel="stylesheet" href="'.$item.'.css" type="text/css"/>'."\n";
                }
            }
        }
        
        if ($common_css) {
            foreach($common_css AS $item){
                if ($item) {
                    $str .= '<link rel="stylesheet" href="'.$item.'.css" type="text/css"/>'."\n";
                }
            }
        }


        if ($script_vendors) {
            foreach($script_vendors AS $item){
                if ($item) {
                    $str .= '<script type="text/javascript" src="'.$item.'.js"></script>'."\n";
                }
            }
        }

        if ($header_script) {
            foreach($header_script AS $item){
                if ($item) {
                    $str .= '<script type="text/javascript" src="'.$item.'.js"></script>'."\n";
                }
            }
        }

        return $str;
    }
}

//Putting our CSS and JS files together
if(!function_exists('include_footer_scripts')){
    function include_footer_scripts() {
        $str = '';
        $ci = &get_instance();
        $footer_script  = $ci->config->item('footer_script');
        $common_js  = $ci->config->item('common_js');
        if ($footer_script) {
            foreach($footer_script AS $item){
                if ($item) {
                    $str .= '<script type="text/javascript" src="'.$item.'.js" ></script>'."\n";
                }
            }
        }
        if ($common_js) {
            foreach($common_js AS $item){
                if ($item) {
                    $str .= '<script type="text/javascript" src="'.$item.'.js"></script>'."\n";
                }
            }
        }
        return $str;
    }
}