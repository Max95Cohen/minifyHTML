<?php

function minifyHTML($view, $active = true) {
    if ($active) {
        $view = removeSpaceSymbols($view);
        $view = removeComments($view);
        $view = minifyTags($view);
        /*$view = sortTagProperties($view);*/
    }

    return trim($view);
}

function removeSpaceSymbols($content) {
    $patterns = [
        '\r|\n' => '',
        '\s+' => ' ',
        '\s+>' => '>',
        '>\s+<' => '><',
    ];

    foreach ($patterns as $pattern => $replace) {
        $content = preg_replace("#$pattern#", $replace, $content);
    }

    return $content;
}

function minifyTags($content) {
    preg_match_all('#<[^/].+?>#', $content, $tags, PREG_SET_ORDER);

    foreach ($tags as $value) {
        $all = $value[0];

        preg_match_all('#".+?"#', $all, $matches);

        if (isset($matches[0]) && !empty($matches[0])) {
            foreach ($matches[0] as $values) {
                $values_ = $values;

                $values_ = str_replace(', ', ',', $values_, $count);

                if (mb_strpos($values_, ' ') === false) {
                    $values_ = str_replace('"', '', $values_);
                }

                $content = str_replace($values, $values_, $content);
            }
        }
    }

    return $content;
}

/*function sortTagProperties($content) {
    preg_match_all('#<[^/].+?>#', $content, $tags, PREG_SET_ORDER);

    foreach ($tags as $value) {
        $all = $value[0];

        $all_ = str_replace('<', '', $all);
        $all_ = str_replace('>', '', $all_);

        preg_match_all('#[^\s/>]+#', $all_, $matches);

        if (count($matches[0]) > 2) {
            print_r($matches[0]);
            $tag = array_shift($matches[0]);
            sort($matches[0]);
            print_r($matches[0]);

            echo "\n\n";
        }
    }

    return $content;
}*/

/*function replaceQuotes($content) {
    return str_replace('"', '\'', $content);
}*/

function removeComments($content) {
    return preg_replace('#<!--\s*.+?\s*-->#', '', $content);
}
