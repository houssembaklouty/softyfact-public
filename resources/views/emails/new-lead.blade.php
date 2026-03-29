<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau lead</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f5;font-family:Arial,Helvetica,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f5;padding:32px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                    {{-- Header --}}
                    <tr>
                        <td style="background:#1565C0;padding:24px 32px;">
                            <h1 style="margin:0;color:#ffffff;font-size:20px;">📩 Nouveau lead</h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:32px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;width:140px;">Nom</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;font-weight:bold;">{{ $leadData['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Téléphone</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $leadData['phone'] }}</td>
                                </tr>
                                @if(!empty($leadData['company']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Entreprise</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $leadData['company'] }}</td>
                                </tr>
                                @endif
                                @if(!empty($leadData['message']))
                                <tr>
                                    <td colspan="2" style="padding:16px 0 0;">
                                        <p style="color:#6b7280;font-size:13px;margin:0 0 6px;">Message</p>
                                        <div style="background:#f9fafb;border:1px solid #e5e7eb;border-radius:6px;padding:16px;color:#374151;font-size:14px;line-height:1.6;">
                                            {{ $leadData['message'] }}
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @if(!empty($leadData['source_page']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Page source</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $leadData['source_page'] }}</td>
                                </tr>
                                @endif
                            </table>

                            <hr style="border:none;border-top:1px solid #e5e7eb;margin:24px 0;">

                            <a href="tel:{{ preg_replace('/\s/', '', $leadData['phone']) }}" style="display:inline-block;background:#1565C0;color:#ffffff;text-decoration:none;padding:12px 24px;border-radius:6px;font-size:14px;font-weight:bold;">
                                📞 Appeler {{ $leadData['name'] }}
                            </a>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background:#f9fafb;padding:16px 32px;text-align:center;color:#9ca3af;font-size:12px;">
                            {{ config('app.name') }} — softyfact.tn
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
