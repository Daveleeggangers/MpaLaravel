<?php
    include("simple_html_dom.php");
        // Create DOM from URL, paste your destined web url in $page 
        $page = "https://ipcamlive.com/61e690ab39bea";
        $html = new simple_html_dom();
        
       //Within $html your webpage will be loaded for further operation
        $html->load_file($page);
        
        // Find all links
        $links = array();

        $scripts = $html->find('script');
            foreach($scripts as $s) {


                if (strpos($s->innertext, 'token') !== false) {
                    $script_array = explode('"', $s->innertext, 1);
                    $token = $script_array;
                    $line = $script_array[0];
                    $split1 = explode( "var token = '", $script_array[0] );
                    $split2 = explode( "'",  $split1[1] );
                    print_r($split2[0]);
                    break;
                }
                
            }

        reset($links);
        //$out will be having each of HTML element content you searching for, within that web page
        foreach ($links as $out) 
        {
            echo $out;
        }                
    
?>