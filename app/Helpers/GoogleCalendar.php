<?php

if (!function_exists('generateGoogleCalendarLink')) {
    function generateGoogleCalendarLink(string $eventId, string $calendarId): string
    {
        $eid = base64_encode("{$eventId} {$calendarId}");
        $eid = rtrim(strtr($eid, '+/', '-_'), '=');
        return "https://www.google.com/calendar/event?eid={$eid}";
    }
}
