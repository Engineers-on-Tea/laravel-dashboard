<?php

namespace App\Bll;

use App\Modules\Admin\Models\Language;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class Lang
{
    public static function getAll(): Collection|array
    {
        return Language::query()
            ->get();
    }

    public static function getAdminLang()
    {
        $lang = Session::get('admin_lang');
        if (!$lang) {
            $lang = Language::query()
                ->where('is_default', 1)
                ->first();

            if (!$lang) {
                $lang = Language::query()
                    ->first();
            }

            Session::put('admin_lang', $lang);
        }
        return $lang;
    }

    /**
     * @throws Exception
     */
    public static function getAdminLangCode(): string
    {
        return self::getAdminLang()->__get('code');
    }

    /**
     * @throws Exception
     */
    public static function getAdminLangId(): int
    {
        return self::getAdminLang()->__get('id');
    }

    /**
     * @throws Exception
     */
    public static function getAdminLangTitle(): string
    {
        return self::getAdminLang()->__get('title');
    }

    /**
     * @throws Exception
     */
    public static function getAdminLangDir(): string
    {
        return self::getAdminLang()->__get('direction');
    }

    public static function getLang()
    {
        $lang = Session::get('lang');
        if (!$lang) {
            $lang = Language::query()
                ->where('is_default', 1)
                ->first();

            if (!$lang) {
                $lang = Language::query()
                    ->first();
            }

            Session::put('lang', $lang);
        }
        return $lang;
    }

    /**
     * @throws Exception
     */
    public static function getLangCode(): string
    {
        return self::getLang()->__get('code');
    }

    /**
     * @throws Exception
     */
    public static function getLangId(): int
    {
        return self::getLang()->__get('id');
    }

    /**
     * @throws Exception
     */
    public static function getLangTitle(): string
    {
        return self::getLang()->__get('title');
    }

    /**
     * @throws Exception
     */
    public static function getLangDir(): string
    {
        return self::getLang()->__get('direction');
    }
}
