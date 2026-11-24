<?php

if (!function_exists('clean_html')) {
    /**
     * Sanitizes HTML content allowing only safe tags.
     *
     * @param string|null $html
     * @return string
     */
    function clean_html($html)
    {
        if (empty($html)) {
            return '';
        }

        $allowedTags = '<p><br><b><strong><i><em><ul><ol><li><a><img><h1><h2><h3><h4><h5><h6><blockquote><span><div><hr><table><thead><tbody><tr><th><td>';

        return strip_tags($html, $allowedTags);
    }
}
