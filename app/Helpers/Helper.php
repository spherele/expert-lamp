<?php

use Carbon\Carbon;


/**
 * Форматирует дату с предустановленными форматами, локализацией и временем.
 *
 * @param string $date Дата для форматирования.
 * @param string $format Формат вывода (по умолчанию используется простая дата).
 * @param string|null $locale Локализация (например, 'ru' для русского языка).
 * @param bool $useTimeFormat Учитывать ли время (true - локализованный формат времени).
 * @return string Отформатированная дата.
 */
function formatDate($date, $format = 'DEFAULT', $locale = null, $useTimeFormat = false) {

    $formats = [
        'DEFAULT' => 'd.m.Y',
        'DATETIME' => 'd.m.Y H:i',
        'ISO_DATE' => 'YYYY-MM-DD',
        'ISO_DATETIME' => 'YYYY-MM-DD HH:mm',
        'LONG_DATE' => 'D MMMM YYYY',
        'LONG_DATETIME' => 'D MMMM YYYY, H:mm',
    ];

    $carbonDate = Carbon::parse($date);

    if ($locale) {
        $carbonDate->locale($locale);
    }

    if ($useTimeFormat && isset($formats[$format])) {
        return $carbonDate->isoFormat($formats[$format]);
    }

    return $carbonDate->format($formats[$format] ?? $format);
}


function formatPath($filename) {
    if (empty($filename)) {
        return '';
    }

    return '/storage/' . ltrim($filename, '/');
}
