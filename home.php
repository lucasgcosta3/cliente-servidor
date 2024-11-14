<?php 
  //session_start();

  // if (!isset($_SESSION["email"]) and !isset($_SESSION["senha"])){
  //   header("Location: login.php");
  // }

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
   <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Cursos</a>
            <a href="#">Curiosidades</a>
            <a href="#">Fale Conosco</a>
        </nav>

        <a href="logout.php"><button><i class="fas fa-sign-out-alt"></i> Logout</button></a>
    </header>
        <main>
        <section>
            <h2>HTML: HyperText Markup Language</h2>
            <p>
               HTML (Linguagem de Marcação de HiperTexto) é o bloco de construção mais básico da web. Define o significado e a estrutura do conteúdo da web. Outras tecnologias além do HTML geralmente são usadas para descrever a aparência/apresentação (CSS) ou a funcionalidade/comportamento (JavaScript) de uma página da web.

             "Hipertexto" refere-se aos links que conectam páginas da Web entre si, seja dentro de um único site ou entre sites. Links são um aspecto fundamental da web. Ao carregar conteúdo na Internet e vinculá-lo a páginas criadas por outras pessoas, você se torna um participante ativo na world wide web.
            </p>

            <img src="assets/images/html_logo.svg" alt="">

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi repellat, natus doloremque, tenetur cumque perspiciatis nostrum praesentium at quisquam quo repudiandae molestiae aperiam fuga, autem obcaecati ad? Quis, at odio!<br><br>
            </p>
        </section>

        <section>
            <h2> CSS: Cascading Style Sheets</h2>

            <p>
                CSS (Cascading Style Sheets ou Folhas de Estilo em Cascata) é uma linguagem de estilo usada para descrever a apresentação de um documento escrito em HTML ou em XML (incluindo várias linguagens em XML como SVG, MathML ou XHTML). O CSS descreve como elementos são mostrados na tela, no papel, na fala ou em outras mídias.

                CSS é uma das principais linguagens da open web e é padronizada em navegadores web de acordo com as especificação da W3C. Desenvolvido em níveis, o CSS1 está atualmente obsoleto, o CSS2.1 é uma recomendação e o CSS3, agora dividido em pequenos módulos, está progredindo para a sua padronização.

            </p>

            <img src="assets/images/css_logo.svg" alt="">

            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit asperiores ullam minus vero provident optio, et laboriosam quos quidem ipsam accusamus non, similique sequi iusto tempore aut eum est illo!<br><br>
            </p>
        </section>

        <section>
            <h2>PHP: Hypertext Preprocessor</h2>

            <p>
                PHP (um acrônimo recursivo para "PHP: Hypertext Preprocessor", originalmente Personal Home Page) é uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicações presentes e atuantes no lado do servidor, capazes de gerar conteúdo dinâmico na World Wide Web. Figura entre as primeiras linguagens passíveis de inserção em documentos HTML, dispensando em muitos casos o uso de arquivos externos para eventuais processamentos de dados. O código é interpretado no lado do servidor pelo módulo PHP, que também gera a página web a ser visualizada no lado do cliente.
            </p>

            <img src="assets/images/php_logo.svg" alt="">

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione aut itaque tenetur expedita repellat rem aliquam qui quibusdam quaerat veritatis id praesentium optio, mollitia dolorum ad natus delectus. Corrupti, harum?
            </p>
        </section>
    </main>
</body>
</html>