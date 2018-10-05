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
        $textoLogistica ="<p>A São Pedro Granitos visando agilidade e comodidade logística, entrega a mercadoria na sua empresa com o menor custo e tempo, com praticidade e confiabilidade tendo transporte próprio.</p>
        <p>Entre em contato para mais informações.</p>";
        $textoSobreNos = "<p>Somos uma empresa de venda de blocos, chapas e pisos de granito situada no norte do Espírito Santo na cidade de Nova Venécia, região que abriga uma das maiores e melhores pedreiras de rochas ornamentais do Brasil.</p>
            <p>Possuímos facilidade em adquirir materiais de ótima qualidade de diferentes pedreiras renomadas no mercado nacional e global com preços justos e acessíveis a todos.</p>
            <p>Desenvolvemos um trabalho diferenciado a fim de atender melhor nossos clientes e parceiros levando  o máximo qualidade, seriedade e confiabilidade em nossos produtos e serviços.</p>";
        $background = "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/bg.jpeg?alt=media&token=09ee52ac-24bb-45d2-a02e-1b12f2d26442";
        $services = "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/services.jpg?alt=media&token=8397c5f8-fcef-462e-97b1-31aee42efbff";
        $about_us = "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/sobre-nos.jpg?alt=media&token=f4de0e5b-144e-404b-9777-bab2ce306e7b";
        
        $projetos_fulls = [
            'ch1' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fch01.jpg?alt=media&token=e8f8150e-cc75-409d-90d9-ada13c6200f0",
            'ch2' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fch02.jpg?alt=media&token=a84dbfad-a6e1-4303-ba51-41dfa3ae4100",
            'ch3' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fch03.jpg?alt=media&token=9f9ad6de-ffd0-470f-94f1-2eb9061af21a",
            'ch4' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fch04.jpg?alt=media&token=d2eb0a80-09cc-4a1a-9777-590bc64aadf1",
            'cz1' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fcz01.jpg?alt=media&token=ed600c5f-213b-4f2a-91a1-c661cb2cc294",
            'cz2' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fcz01.jpg?alt=media&token=ed600c5f-213b-4f2a-91a1-c661cb2cc294",
            'cz3' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fcz03.jpg?alt=media&token=59d35eee-6e4e-49c1-9a38-c9da8c06b3d5",
            'cz4' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fcz03.jpg?alt=media&token=59d35eee-6e4e-49c1-9a38-c9da8c06b3d5",
            'esc1' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fesc01.jpg?alt=media&token=6fca8354-4614-4cae-9af9-d26dae17698d",
            'esc2' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fesc02.jpg?alt=media&token=0b4ba0fc-0b13-4e49-9d97-416db11915eb",
            'esc3' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Fesc03.jpg?alt=media&token=8d50f1af-2544-40f1-b0be-cacb425974b7",
            'entrada' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Ffulls%2Ffr01.jpg?alt=media&token=c661fb1a-0846-41d3-a12f-7698104b3ddc"
        ];

        $projetos_thumbs = [
            'ch1' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fch01.jpg?alt=media&token=fda57289-1035-4f84-a565-a39edf099f0f",
            'ch2' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fch02.jpg?alt=media&token=86c32466-d916-4c7f-9786-28f5716c9db5",
            'ch3' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fch03.jpg?alt=media&token=6c925b54-e849-4a33-bd32-cefd7a6f384a",
            'ch4' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fch04.jpg?alt=media&token=681568f6-a347-4130-80b4-5a96ab716fc6",
            'cz1' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fcz01.JPG?alt=media&token=a6e7d52e-e6a6-46a6-a3f0-eb0d679ecd26",
            'cz2' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fcz02.jpg?alt=media&token=b6c787cb-17a5-4894-ba6c-1f9ebf269f62",
            'cz3' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fcz03.jpg?alt=media&token=80ca38df-4aef-4fc4-94ce-8b321ba2dfa1",
            'cz4' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fcz04.JPG?alt=media&token=240c757b-fdde-432c-add2-9a3297938004",
            'esc1' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fesc01.png?alt=media&token=fcd49fa4-fba1-438f-92fb-9667a383b766",
            'esc2' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fesc02.JPG?alt=media&token=daba402d-34f3-40ee-92b2-bbbe220bb043",
            'esc3' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Fesc03.JPG?alt=media&token=d661ca0f-0ee4-4e3f-9bc7-e1f2ffdd2231",
            'entrada' => "https://firebasestorage.googleapis.com/v0/b/spgranitos-40bee.appspot.com/o/projetos%2Fthumbs%2Ffr01.png?alt=media&token=817bac61-7946-4e65-8448-7b184aab71eb",
        ];

        return view('site.home.index', compact('texto1',
        'textoPjtos',
        'textoLinha',
        'textoLogistica',
        'textoSobreNos',
        'background',
        'services',
        'about_us',
        'projetos_fulls',
        'projetos_thumbs'));
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
