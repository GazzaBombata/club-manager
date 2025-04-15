<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Reminder evento Clubberly</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; padding: 40px; border-radius: 8px;">
                <tr>
                    <td style="text-align: center;">
                        <h2 style="color: #0f766e; margin-bottom: 10px;">📌 RSVP Mancante</h2>
                        <p style="color: #333333; font-size: 16px; margin-bottom: 30px;">
                            Ti ricordiamo che non hai ancora risposto all'invito per il seguente evento:
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px; background-color: #f0fdfa; border-radius: 6px;">
                        <p style="margin: 0; font-size: 18px;"><strong>{{ $meeting->meeting_name }}</strong></p>
                        <p style="margin: 4px 0;">📍 {{ $meeting->location }}</p>
                        <p style="margin: 4px 0;">📅 {{ $meeting->meeting_date->format('d/m/Y H:i') }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; padding: 30px 0;">
                        @php
                            $eventUrl = generateGoogleCalendarLink(
                                $meeting->google_event_id,
                                $meeting->club?->googleAccount?->email
                            );
                        @endphp
                        <a href="{{ $eventUrl }}"
                           style="background-color: #0f766e; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-size: 16px;">
                            Apri in Google Calendar
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 14px; color: #888888;">
                        <p>Grazie per la collaborazione!<br>Il team di <strong>Clubberly</strong></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
