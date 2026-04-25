<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle commande</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f5;font-family:Arial,Helvetica,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f5;padding:32px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                    {{-- Header --}}
                    <tr>
                        <td style="background:#006B59;padding:24px 32px;">
                            <h1 style="margin:0;color:#ffffff;font-size:20px;">🛒 Nouvelle commande Cloud</h1>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:32px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;width:140px;">Téléphone</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;font-weight:bold;">{{ $orderData['phone'] }}</td>
                                </tr>
                                @if(!empty($orderData['name']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Nom</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $orderData['name'] }}</td>
                                </tr>
                                @endif
                                @if(!empty($orderData['email']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Email</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $orderData['email'] }}</td>
                                </tr>
                                @endif
                                @if(!empty($orderData['city']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Ville</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $orderData['city'] }}</td>
                                </tr>
                                @endif
                                @if(!empty($orderData['address']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Adresse</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $orderData['address'] }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Type</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">
                                        ☁️ Cloud ({{ config('app.order_amount_online', 119) }} DT — Paiement unique)
                                    </td>
                                </tr>
                                @if(!empty($orderData['ab_variant']))
                                <tr>
                                    <td style="padding:8px 0;color:#6b7280;font-size:13px;">Variante A/B</td>
                                    <td style="padding:8px 0;color:#111827;font-size:15px;">{{ $orderData['ab_variant'] }}</td>
                                </tr>
                                @endif
                            </table>

                            <hr style="border:none;border-top:1px solid #e5e7eb;margin:24px 0;">

                            <a href="{{ config('app.core_app_url') }}/admin" style="display:inline-block;background:#006B59;color:#ffffff;text-decoration:none;padding:12px 24px;border-radius:6px;font-size:14px;font-weight:bold;">
                                Voir dans le tableau de bord →
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
