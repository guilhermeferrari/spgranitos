<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer;

class SiteController extends Controller
{
    public function index(){
        $texto1 = "A São Pedro Granitos oferece as mais diversas colorações e padrões de chapas, pisos e blocos para revestir sua obra com materiais de alta qualidade e preço baixo.<br>Confira nossa linha e nossos projetos.";
        $textoPjtos = "<p>A beleza natural das rochas ornamentais transformada em produtos de excelente qualidade e durabilidade.</p>";
        $textoLinha = "<p></p>";
        $textoLogistica ="<p>A São Pedro Granitos visando agilidade e comodidade logística entrega a mercadoria na sua empresa com o menor custo e tempo com praticidade e confiabilidade de nosso motorista e caminhão VW 8-150 Delivey.</p>
            <p>O raio de entrega será de uma distância média de 200km. Entre em contato para mais informações!</p>";
        $textoSobreNos = "<p>Somos uma empresa de venda de blocos, chapas e pisos de granito situada no norte do Espírito Santo na cidade de Nova Venécia, região que abriga uma das maiores e melhores pedreiras de rochas ornamentais do Brasil.</p>
            <p>Possuímos facilidade em adquirir materiais de ótima qualidade de diferentes pedreiras renomadas no mercado nacional e global com preços justos e acessíveis a todos.</p>
            <p>Desenvolvemos um trabalho diferenciado a fim de atender melhor nossos clientes e parceiros levando  o máximo qualidade, seriedade e confiabilidade em nossos produtos e serviços.</p>";
    	return view('site.home.index', compact('texto1','textoPjtos','textoLinha','textoLogistica','textoSobreNos'));
    }

    public function email(Request $request){
    	$text             = $request->message;
        $mail             = new PHPMailer\PHPMailer(); // create a n
        $mail->IsSMTP();
        $mail->SMTPDebug  = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth   = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail or tsl
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "testmail@gmail.com";
        $mail->Password = "testpass";
        $mail->SetFrom( $request->email, $request->name);
        $mail->Subject = "Contato Site: ";
        $mail->Body    = $text;
        $mail->AddAddress("guilhermefbravin@gmail.com", "Guilherme");
        if ($mail->Send()) {
            return 'Email Sended Successfully';
        } else {
            return 'Failed to Send Email';
        }
    }
}
