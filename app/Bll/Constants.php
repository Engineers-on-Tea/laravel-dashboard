<?php

namespace App\Bll;

class Constants
{
    /**
     * Uploads Path
     */
    public const BlogCategoryPath = 'uploads' . DIRECTORY_SEPARATOR . 'blog-category' . DIRECTORY_SEPARATOR;
    public const BlogPath = 'uploads' . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR;
    public const CountryPath = 'uploads' . DIRECTORY_SEPARATOR . 'country' . DIRECTORY_SEPARATOR;
    public const CityPath = 'uploads' . DIRECTORY_SEPARATOR . 'city' . DIRECTORY_SEPARATOR;
    public const LanguagePath = 'uploads' . DIRECTORY_SEPARATOR . 'language' . DIRECTORY_SEPARATOR;
    public const UserPath = 'uploads' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR;
    public const SettingPath = 'uploads' . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR;

    /**
     * Session Keys
     */
    // Language keys
    public const AdminLang = 'admin_lang';
    public const Lang = 'lang';
    // Settings key
    public const Settings = 'settings';
}
