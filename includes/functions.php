<?php

function redirect_to($location = NULL) {
    if($location != NULL) {
        header("Location: {$location}");
        exit;
    }
}

function include_layout_template($template="") {
    include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . $template);
}
function log_action($action, $message="") {
    $filename = SITE_ROOT . DS . 'logs' . DS .'log.txt';
    if($handle = fopen($filename, 'a')) {
        $content = strftime('%Y/%m/%d %H:%M:%S')." | ".$action.' : '
            .$message ."\n";
        fwrite($handle ,$content);
        fclose($handle);
    } else {
        echo "Can't open file logs/log.txt";
    }
}

function __autoload($class_name) {
    $class_name = strtolower($class_name);
    $path = LIB_PATH.DS."{$class_name}.php";
    if(file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class_name}.php could not be found.");
    }
}

?>
