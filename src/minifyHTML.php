<?php

function minifyHTML($view, $active = true) {
    if ($active) {
        $view = preg_replace('#\s+>#', '>', $view);
        $view = preg_replace('#\r|\n#', '', $view);
        $view = preg_replace('#>\s+<#', '><', $view);
        $view = preg_replace('#\s+#', ' ', $view);
    }

    return $view;
}
