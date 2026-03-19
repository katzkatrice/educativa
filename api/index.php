<?php

declare(strict_types=1);

$publicPath = dirname(__DIR__) . '/public';
$indexPath = $publicPath . '/index.php';
$requestPath = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
$resolvedPublicPath = realpath($publicPath);
$resolvedRequestedPath = realpath($publicPath . $requestPath);

if (
    $requestPath !== '/'
    && $resolvedPublicPath !== false
    && $resolvedRequestedPath !== false
    && str_starts_with($resolvedRequestedPath, $resolvedPublicPath)
    && is_file($resolvedRequestedPath)
) {
    $extension = strtolower(pathinfo($resolvedRequestedPath, PATHINFO_EXTENSION));
    $mimeTypes = [
        'css' => 'text/css',
        'gif' => 'image/gif',
        'ico' => 'image/vnd.microsoft.icon',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'png' => 'image/png',
        'svg' => 'image/svg+xml',
        'txt' => 'text/plain',
        'webp' => 'image/webp',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
    ];

    if (isset($mimeTypes[$extension])) {
        header('Content-Type: ' . $mimeTypes[$extension]);
    }

    readfile($resolvedRequestedPath);
    return;
}

$_SERVER['SCRIPT_FILENAME'] = $indexPath;
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';

chdir($publicPath);

require $indexPath;
