<?php

class FuncoesHelper extends AppHelper {

    var $helpers = array('Html');

    function money($val) {
        return number_format($val, 2, ',', '.');
    }

    function plainMoney($val) {
        return number_format($val, 2, '', '');
    }

    function cEcho($val) {
        echo (!empty($val)) ? $val : '-';
    }

    function yesOrNo($val) {
        $yesno = array(0 => 'Não', 1 => 'Sim');

        return $yesno[$val];
    }

    function breadcrumbs($b) {
        $output = '';

        if (!empty($b)) {
            foreach ($b as $k => $v) {
                $output .= "\t\t\t\t\t<li>".$this->Html->link($k, $v)."</li>\n";
            }
        }

        return $this->output($output);
    }

    function resizer() {
        $argsnum = func_num_args();
        $args    = func_get_args();

        if ($argsnum < 2) die('Número errado de argumentos.');

        $options = array();
        $file    = $args[$argsnum-1];
        $height  = null;
        $width   = $args[0];

        if (is_array($args[$argsnum-1])) {
            $options = $args[$argsnum-1];
            $file    = $args[$argsnum-2];
            if ($argsnum == 4) $height = $args[1];
        } else {
            if ($argsnum == 3) $height = $args[1];
        }

        $imagename  = 'cache-';
        $imagename .= (is_null($height)) ? $width.'-'.$file : $width.'-'.$height.'-'.$file;
        $original   = Configure::read('images.path').$file;

        App::import('File');
        $image = new File(Configure::read('images.path').$imagename);

        if (!$image->exists()) {
            App::import('Vendor', 'EasyGD', array('file' => 'easygd.php'));
            $egd = new EasyGD;
            $egd->startFromFile($original);

            if ($height) {
                if ($egd->x() > $egd->y()) $egd->height($width+4);
                else $egd->width($height+4);

                $egd->crop($width, $height);
            } else {
                $egd->width($width);
            }

            $egd->save(Configure::read('images.path'), $imagename)->end();
        }

        return $this->output($this->Html->image('products/'.$imagename, $options));
    }
    
    function clear_print($resource) {
        
        function loop($var, $index, $text, $nivel, $type) {
                $object_colors = array("#f3edbf", "#e8df9b", "#ded27a", "#d2c45b", "#c7b63a", "#b8a61f", "#a3910f", "#867707");
                $array_colors = array("#d9d9d9", "#c1c1c1", "#acacac", "#969696", "#808080", "#6b6b6b");
                
                $text .= "<li";
                
                if(is_array($var)) {
                        if($type == 1) {
                                $color = $array_colors[$nivel];
                                $color_back = $array_colors[$nivel-1];
                                $nivel ++;
                                if($nivel > 5) { $nivel = 0; }
                        } else {
                                if($type == 2) { $color_back = $object_colors[$nivel-1]; }
                                $color = $array_colors[0];
                                $nivel = 1;
                        }
                        
                        $text .= " style='background-color: " . $color . ";'><span style='background-color: " . $color_back . ";'>[ ".$index." ] =></span> ";
                        $text .= "Array<br />( <ul>";
                        foreach($var as $key=>$value) {
                                $text = loop($value, $key, $text, $nivel, 1);
                        }
                        $text .= "</ul> )";
                } elseif(is_object($var)) {
                        if($type == 2) {
                                $color = $object_colors[$nivel];
                                $color_back = $object_colors[$nivel-1];
                                $nivel++;
                                if($nivel > 7) { $nivel = 0; }
                        } else {
                                if($type == 1) { $color_back = $array_colors[$nivel-1]; }
                                $color = $object_colors[0];
                                $nivel = 1;
                        }
                        
                        $text .= " style='background-color: " . $color . ";'><span style='background-color: " . $color_back . ";'>[ ".$index." ] =></span> ";
                        $text .= get_class($var) . " Object<br />( <ul>";
                        foreach($var as $key=>$value) {
                                $text = loop($value, $key, $text, $nivel, 2);
                        }
                        $text .= "</ul> )";
                } else {
                        $text .= '>[ ' . $index . ' ] => [ "' . $var . '" ]';
                }
                
                $text .= "</li>";
                return $text;
        }
        
        $output = "";
        if(is_array($resource)) {
                $output .= "<div style='background-color: #d9d9d9;'>Array<br />( <ul>";
                foreach($resource as $key=>$value) {
                        $output = loop($value, $key, $output, 1, 1);
                }
                $output .= "</ul> );</div>";
        } elseif(is_object($resource)) {
                $output .= "<div style='background-color: #f3edbf;'>" . get_class($resource) . " Object<br />( <ul>";
                $resource_array = (array)$resource;
                foreach($resource_array as $key=>$value) {
                        $output = loop($value, $key, $output, 1, 2);
                }
                $output .= "</ul> );</div>";
        } else {
                $output .= $resource;
        }
        
        echo $output;
}
}