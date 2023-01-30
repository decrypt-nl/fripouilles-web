<?php

abstract class TemplateHelper
{
    public static function assetPath(string $filename): void
    {
        echo '/assets/'.$filename;
    }

    public static function urlPath(string $url): void
    {
        echo '/'.$url;
    }
}
