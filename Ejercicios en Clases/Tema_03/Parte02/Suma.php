<!-- <?php
// $suma = 0;

// foreach ($_POST['sumando'] as $valor){ {
//     $suma += $valor;
// }
// echo "El valor de la usma es:  " . $suma;

// // ?> -->

// <!-- <?php

// // Subsistema 1: Validación de correos electrónicos
// class EmailValidator {
//     public function validate($email) {
//         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             echo "Correo electrónico válido: $email<br>";
//             return true;
//         } else {
//             echo "Correo electrónico inválido: $email<br>";
//             return false;
//         }
//     }
// }

// // Subsistema 2: Configuración del servidor SMTP
// class SmtpServer {
//     public function configure() {
//         echo "Servidor SMTP configurado correctamente.<br>";
//     }
// }

// // Subsistema 3: Envío del correo electrónico
// class EmailSender {
//     public function send($to, $subject, $body) {
//         echo "Enviando correo a: $to<br>";
//         echo "Asunto: $subject<br>";
//         echo "Cuerpo: $body<br>";
//         echo "Correo enviado exitosamente.<br>";
//     }
// }

// // Facade: Simplifica el proceso de envío de correos
// class EmailFacade {
//     private $validator;
//     private $smtpServer;
//     private $emailSender;

//     public function __construct() {
//         $this->validator = new EmailValidator();
//         $this->smtpServer = new SmtpServer();
//         $this->emailSender = new EmailSender();
//     }

//     // Método simplificado para enviar un correo
//     public function sendEmail($to, $subject, $body) {
//         if ($this->validator->validate($to)) {
//             $this->smtpServer->configure();
//             $this->emailSender->send($to, $subject, $body);
//         } else {
//             echo "No se puede enviar el correo debido a un correo inválido.<br>";
//         }
//     }
// }

// // Uso del Facade
// $facade = new EmailFacade();
// $facade->sendEmail("usuario@example.com", "Bienvenido", "Gracias por registrarte en nuestro sitio.");
// echo "<br>";

// // Intento con un correo inválido
// $facade->sendEmail("correo-invalido", "Prueba", "Este es un mensaje de prueba.");

?> -->