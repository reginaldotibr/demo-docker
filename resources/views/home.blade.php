@php( $appName = config('app.name', 'Minha Aplicação') )
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $appName }} — Home</title>

  <!-- Tipografia -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg:#0b1220; --panel:#111827; --text:#e5e7eb; --muted:#a1a1aa;
      --primary:#7c3aed; --primary-2:#22d3ee; --accent:#f59e0b; --success:#10b981; --danger:#ef4444;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0; font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,'Helvetica Neue',Arial;
      color:var(--text);
      background:
        radial-gradient(1200px 600px at 10% 10%, rgba(124,58,237,.10), transparent 60%),
        radial-gradient(1000px 500px at 90% 20%, rgba(34,211,238,.10), transparent 60%),
        linear-gradient(180deg, #0b1220 0%, #0e1629 100%);
    }
    .container{max-width:1200px;margin:0 auto;padding:24px}

    /* Navbar */
    .nav{display:flex;align-items:center;justify-content:space-between;padding:12px 0}
    .brand{display:flex;align-items:center;gap:12px;color:var(--text);text-decoration:none}
    .logo{width:40px;height:40px;border-radius:12px;background:
      conic-gradient(from 210deg, var(--primary), var(--primary-2), var(--accent), var(--primary));
      box-shadow:0 0 0 6px rgba(124,58,237,.12), 0 10px 30px rgba(0,0,0,.35);
    }
    .menu{display:flex;gap:18px}
    .menu a{color:var(--muted);text-decoration:none;font-weight:600}
    .menu a:hover{color:var(--text)}

    /* Hero */
    .hero{display:grid;grid-template-columns:1.1fr .9fr;gap:28px;align-items:center;padding:28px 0}
    .title{font-size:clamp(28px,4vw,48px);line-height:1.1;margin:0 0 12px}
    .subtitle{color:var(--muted);font-size:clamp(14px,2vw,18px);margin:0 0 18px}
    .cta{display:flex;gap:12px;flex-wrap:wrap}
    .btn{
      padding:12px 18px;border-radius:12px;border:1px solid rgba(124,58,237,.35);
      background:linear-gradient(180deg, rgba(124,58,237,.25), rgba(124,58,237,.10));
      color:white;text-decoration:none;font-weight:700;letter-spacing:.2px;
      box-shadow:0 8px 24px rgba(0,0,0,.35);
    }
    .btn:hover{transform:translateY(-1px);box-shadow:0 12px 32px rgba(0,0,0,.45)}
    .btn.secondary{background:transparent;border-color:rgba(229,231,235,.25);color:var(--text)}

    /* Painéis */
    .card{background:linear-gradient(180deg, rgba(17,24,39,.92), rgba(17,24,39,.85));
      border:1px solid rgba(124,58,237,.25);border-radius:18px;padding:20px;box-shadow:0 12px 40px rgba(0,0,0,.35)}
    .preview{aspect-ratio:4/3;border-radius:16px;background:
      radial-gradient(600px 300px at 20% 20%, rgba(124,58,237,.20), transparent 60%),
      radial-gradient(700px 350px at 80% 20%, rgba(34,211,238,.18), transparent 60%),
      #0b1220; border:1px dashed rgba(229,231,235,.12);
      display:grid;place-items:center;color:var(--muted);font-size:14px}

    /* Formulário de Solicitação de Carrinho */
    .form{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:8px}
    .form .full{grid-column:1/-1}
    label{display:block;font-weight:600;font-size:13px;margin-bottom:6px;color:var(--muted)}
    input,select,textarea{width:100%;padding:12px;border-radius:12px;border:1px solid rgba(229,231,235,.15);
      background:#0e1629;color:var(--text);outline:none}
    input:focus,select:focus,textarea:focus{border-color:var(--primary);box-shadow:0 0 0 4px rgba(124,58,237,.18)}
    .actions{display:flex;gap:12px;align-items:center;margin-top:12px}
    .submit{
      padding:12px 18px;border-radius:12px;border:1px solid rgba(34,211,238,.35);
      background:linear-gradient(180deg, rgba(34,211,238,.30), rgba(34,211,238,.12));
      color:white;font-weight:800;letter-spacing:.3px;cursor:pointer
    }
    .submit:hover{transform:translateY(-1px);box-shadow:0 12px 32px rgba(0,0,0,.45)}
    .note{color:var(--muted);font-size:12px}

    /* Features */
    .features{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:24px}
    .feature{padding:14px;border-radius:12px;border:1px solid rgba(229,231,235,.12);background:rgba(17,24,39,.65)}
    .feature h3{margin:6px 0 8px;font-size:16px}
    .feature p{margin:0;color:var(--muted);font-size:14px}

    /* Footer */
    .foot{display:flex;justify-content:space-between;align-items:center;margin-top:32px;padding:18px 0;color:var(--muted);font-size:13px}
    .foot a{color:var(--muted);text-decoration:none}
    .foot a:hover{color:var(--text)}

    @media(max-width:980px){.hero{grid-template-columns:1fr}.form{grid-template-columns:1fr}.features{grid-template-columns:1fr}}
  </style>
</head>
<body>
  <div class="container">
    <!-- Navbar -->
    <nav class="nav">
      <a class="brand" href="{{ route('home') }}">
        <div class="logo" aria-hidden="true"></div>
        <strong>{{ $appName }}</strong>
      </a>
      <div class="menu">
        <a href="#inicio">Início</a>
        <a href="#produtos">Produtos</a>
        <a href="#contato">Contato</a>
      </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="inicio">
      <div>
        <h1 class="title">Página inicial vibrante e elegante</h1>
        <p class="subtitle">Formulário enxuto, menu objetivo e uma CTA destacada para <strong>Solicitar Carrinho</strong>.</p>
        <div class="cta">
          <a class="btn" href="#form">Solicitar carrinho</a>
          <a class="btn secondary" href="#produtos">Ver produtos</a>
        </div>

        <div class="features" id="produtos" style="margin-top:20px">
          <div class="feature"><h3>Design com vida</h3><p>Cores vibrantes e gradientes sutis.</p></div>
          <div class="feature"><h3>Acessível</h3><p>Foco visível, contraste alto e labels claros.</p></div>
          <div class="feature"><h3>Responsivo</h3><p>Layout fluido do mobile ao desktop.</p></div>
        </div>
      </div>
      <div class="card">
        <div class="preview">Espaço para imagem do produto, gráfico ou destaque</div>
      </div>
    </section>

    <!-- Formulário de Solicitação de Carrinho -->
    <section class="card" id="form" aria-labelledby="form-title">
      <h2 id="form-title" style="margin:0 0 10px; font-size:20px">Solicitar Carrinho</h2>
      <form action="{{ route('home') }}" method="post" onsubmit="return false" aria-describedby="form-note">
        @csrf
        <div class="form">
          <div>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Seu nome" required>
          </div>
          <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="voce@exemplo.com" required>
          </div>
          <div>
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(71) 90000-0000">
          </div>
          <div>
            <label for="produto">Produto</label>
            <select id="produto" name="produto" required>
              <option value="">Selecione...</option>
              <option>Produto A</option>
              <option>Produto B</option>
              <option>Produto C</option>
            </select>
          </div>
          <div>
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" min="1" value="1" required>
          </div>
          <div class="full">
            <label for="observacoes">Observações</label>
            <textarea id="observacoes" name="observacoes" rows="4" placeholder="Detalhes adicionais"></textarea>
          </div>
        </div>
        <div class="actions">
          <button type="submit" class="submit" id="btn-solicitar">Solicitar carrinho</button>
          <span id="form-note" class="note">Enviaremos um retorno rápido com o resumo do seu carrinho.</span>
        </div>
      </form>
    </section>

    <!-- Footer -->
    <footer class="foot">
      <span>© {{ date('Y') }} {{ $appName }}. Todos os direitos reservados.</span>
      <span id="contato">Feito com <a href="https://laravel.com/" target="_blank" rel="noopener">Laravel</a>.</span>
    </footer>
  </div>

  <script>
    // Feedback simples no front ao clicar em "Solicitar carrinho"
    document.getElementById('btn-solicitar')?.addEventListener('click', function(){
      const btn = this;
      btn.disabled = true;
      const original = btn.textContent;
      btn.textContent = 'Enviando...';
      setTimeout(() => {
        btn.textContent = original;
        btn.disabled = false;
        alert('Solicitação de carrinho enviada! Em breve entraremos em contato.');
      }, 800);
    });
  </script>
</body>
</html>