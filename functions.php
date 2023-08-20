<?php
function render_template($path, $data = [])
{
    extract($data);
    ob_start();
    require $path;
    $content = ob_get_clean();
    return $content;
}
