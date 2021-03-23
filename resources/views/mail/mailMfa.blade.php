<!DOCTYPE html>
<html lang='pt-br'>
	<head>
		<meta charset='UTF-8'>
		<title>E-mail</title>

		<style>
			.container {
				margin: 50px auto;
				width: 60%;
			}
		</style>
	</head>
	<body>
		<div class='container'>
			<table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse; padding:0; margin:0 auto; width:600px; border:1px solid #eaeaea; border-radius:2px">
		      <tbody>
		         <tr>
		            <td valign="top" style="font-size:16px; font-family:Arial; font-weight:normal; border-collapse:collapse; vertical-align:top; padding:20px; margin:0; border:1px solid #ebebeb; background:#FFF">
		               <p align="center"><img data-imagetype="External" src="https://i.ibb.co/hMgBtqm/logo.png" height="60"></p>

		               <br>Olá <b>{{ $user->name }} {{ $user->lastName }}</b>, <br><br>Para acessar, informe o código de verificação abaixo na plataforma. <br>O mesmo tem duração de 10 minutos.<br><br>

		               <p align="center" style="font-size:22px; padding:10px; background-color:#e7e7e7"><code><b>{{ $hash }}</b></code></p>

		               <br>Atenciosamente, <br><b>Suporte Antebellum</b> <br><a href="https://antebellum.com.br/" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable">Antebellum</a> 
		            </td>
		         </tr>
		      </tbody>
		   </table>
		</div>
	</body>
</html>