<!-- HTML CODE -->
<?php
// HTML HEAD
$title = 'SCE | Suporte';
require_once './layout/head.php';

// NAV HEADER
require_once './layout/navbar.php';

// SIDEBAR AND SIDEBAR MENU
require_once './layout/sidebar.php';




?>
 
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Suporte</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="container my-5">
  <h2 class="text-center">Suporte ao Cliente</h2>
  <p class="text-center">Estamos aqui para ajudá-lo com qualquer problema. Entre em contato conosco e responderemos o mais rápido possível.</p>

  <div class="row">
    <!-- Informações de Contato -->
    <div class="col-md-6">
      <h4>Informações de Contato</h4>
      <ul class="list-unstyled">
        <li><strong>Telefone:</strong> +55 (18) 98169-5376</li>
        <li><strong>E-mail:</strong> suporte@gmail.com</li>
        <li><strong>WhatsApp:</strong> <a href="https://wa.me/5518981695376">Clique aqui para iniciar a conversa</a></li>
        <li><strong>Horário de Atendimento:</strong> Segunda a Sexta, das 9h às 18h</li>
      </ul>
    </div>

    <!-- Formulário de Contato / futuramente enviar todos formulários preenchidos para tela de solicitações de suporte" -->
    <div class="col-md-6">
      <h4>Formulário de Contato</h4>
      <form>
        <div class="form-group">
          <label for="nome">Seu Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label for="email">Seu E-mail</label>
          <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail">
        </div>
        <div class="form-group">
          <label for="mensagem">Mensagem</label>
          <textarea class="form-control" id="mensagem" rows="4" placeholder="Digite sua mensagem"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>


  <!-- na central de ajuda, direcionar para tela com instruções ilustradas de cada possível problema -->
  <div class="mt-5">
    <h4>Outras Formas de Suporte</h4>
    <p>Você também pode acessar nossa <a href="#">central de ajuda</a> ou explorar as perguntas frequentes <a href="#">aqui</a>.</p>
  </div>
</div>

        </div>
    </section>
</div>
     