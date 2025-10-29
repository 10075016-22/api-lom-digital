<!DOCTYPE html>
<html lang="es">
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f5f5f5;">
    
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        
        <tr>
            <td style="background: linear-gradient(135deg, #1B003F 0%, #4B0082 100%); padding: 30px 20px; text-align: center;">
                <h1 style="color: #E6E6FA; margin: 0; font-size: 28px; font-weight: 300;">Lom Digital</h1>
            </td>
        </tr>
        
        <tr>
            <td style="padding: 40px 30px;">
                
                <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #E6E6FA; border-left: 4px solid #4B0082; margin-bottom: 30px;">
                    <tr>
                        <td style="padding: 20px;">
                            <h2 style="color: #1B003F; font-size: 18px; font-weight: 600; margin: 0 0 10px 0;">Notificación de Formulario - Lom Digital</h2>
                            <p style="margin: 0; color: #4B0082;">Alguien ha enviado un mensaje a través del formulario de contacto de tu página web.</p>
                        </td>
                    </tr>
                </table>
                
                <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8f9fa; border: 1px solid #E6E6FA; border-radius: 8px; overflow: hidden;">
                    
                    <tr>
                        <td style="width: 30%; background-color: #191970; color: #E6E6FA; padding: 15px 20px; font-weight: 600; vertical-align: top; border-bottom: 1px solid #E6E6FA;">
                            Nombre 
                        </td>
                        <td style="width: 70%; padding: 15px 20px; color: #333; vertical-align: top; border-bottom: 1px solid #E6E6FA;">
                            {{ $name ?? '' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 30%; background-color: #191970; color: #E6E6FA; padding: 15px 20px; font-weight: 600; vertical-align: top; border-bottom: 1px solid #E6E6FA;">
                            Email
                        </td>
                        <td style="width: 70%; padding: 15px 20px; color: #333; vertical-align: top; border-bottom: 1px solid #E6E6FA;">
                            {{ $email ?? '' }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 30%; background-color: #191970; color: #E6E6FA; padding: 15px 20px; font-weight: 600; vertical-align: top;">
                            Fecha
                        </td>
                        <td style="width: 70%; padding: 15px 20px; color: #333; vertical-align: top;">
                            {{ $date ?? now()->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                    
                </table>
                
                <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 30px;">
                    <tr>
                        <td>
                            <label style="color: #1B003F; font-weight: 600; margin-bottom: 10px; display: block;">Mensaje:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8f9fa; border: 1px solid #E6E6FA; border-radius: 8px;">
                                <tr>
                                    <td style="padding: 20px; color: #333; line-height: 1.6;">
                                        {{ $message ?? '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                
                <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 30px;">
                    <tr>
                        <td style="text-align: center;">
                            <a href="{{ $website_url ?? '#' }}" 
                               style="display: inline-block; background: linear-gradient(135deg, #6495ED 0%, #4B0082 100%); color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 25px; font-weight: 600;">
                                Ver Página Web
                            </a>
                        </td>
                    </tr>
                </table>
                
            </td>
        </tr>
        
        <tr>
            <td style="background-color: #191970; color: #E6E6FA; padding: 30px 20px; text-align: center;">
                <p style="margin: 0; font-size: 14px;">Este correo fue generado automáticamente por el sistema de Lom Digital</p>
            </td>
        </tr>
        
    </table>
    
</body>
</html>