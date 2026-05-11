<?php
declare(strict_types=1);

const SUPPORTED_LANGS = ['it', 'en', 'fr'];
const DEFAULT_LANG = 'it';

function detect_lang(): string {
    if (!empty($_GET['lang']) && in_array($_GET['lang'], SUPPORTED_LANGS, true)) {
        return $_GET['lang'];
    }
    if (!empty($_COOKIE['lang']) && in_array($_COOKIE['lang'], SUPPORTED_LANGS, true)) {
        return $_COOKIE['lang'];
    }
    $al = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    foreach (explode(',', $al) as $part) {
        $code = strtolower(substr(trim(explode(';', $part)[0]), 0, 2));
        if (in_array($code, SUPPORTED_LANGS, true)) return $code;
    }
    return DEFAULT_LANG;
}

function load_translations(string $lang): array {
    $file = __DIR__ . '/../lang/' . $lang . '.php';
    if (!is_readable($file)) {
        $file = __DIR__ . '/../lang/' . DEFAULT_LANG . '.php';
    }
    return require $file;
}

function t(string $key, ...$args): string {
    global $T;
    $s = $T[$key] ?? $key;
    return $args ? vsprintf($s, $args) : $s;
}

function lang_url(string $code): string {
    $params = $_GET;
    $params['lang'] = $code;
    return '?' . http_build_query($params);
}
