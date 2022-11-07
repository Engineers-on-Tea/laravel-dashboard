<?php

namespace App\Bll;

use App\Models\Language;

class Lang
{
    public static function getAll()
    {
        return Language::query()
            ->get();
    }

    public static function getAdminLang()
    {
        $lang = session()->get('admin_lang');
        if (!$lang) {
            $lang = Language::query()
                ->where('is_default', 1)
                ->first();

            if (!$lang) {
                $lang = Language::query()
                    ->first();
            }

            session()->put('admin_lang', $lang);
        }
        return $lang;
    }

    public static function getAdminLangCode()
    {
        return self::getAdminLang()->code;
    }

    public static function getAdminLangId()
    {
        return self::getAdminLang()->id;
    }

    public static function getAdminLangTitle()
    {
        return self::getAdminLang()->title;
    }

    public static function getAdminLangDir()
    {
        return self::getAdminLang()->direction;
    }

    public static function getLang()
    {
        $lang = session()->get('lang');
        if (!$lang) {
            $lang = Language::query()
                ->where('is_default', 1)
                ->first();

            if (!$lang) {
                $lang = Language::query()
                    ->first();
            }

            session()->put('lang', $lang);
        }
        return $lang;
    }

    public static function getLangCode()
    {
        return self::getLang()->code;
    }

    public static function getLangId()
    {
        return self::getLang()->id;
    }

    public static function getLangTitle()
    {
        return self::getLang()->title;
    }

    public static function getLangDir()
    {
        return self::getLang()->direction;
    }
}
