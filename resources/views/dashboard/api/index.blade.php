@extends('dashboard.layouts.main')
@section('container')

    <h1 id="home" class="mt-3">Documentação da API</h1>
    <br>
    
    <form id="token-form" action="/api/login" method="post" class="mb-5 col-lg-6 mx-auto">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Endereço de E-mail</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating" id="pass">
              <input type="password" name="password" class="form-control" id="password" placeholder="Senha" required>
              <label for="password">Senha</label>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm col-md-6">
                    <div class="input-group mb-3">
                        <input type="submit" class="btn btn-dark form-control mt-2" value="Gerar Token">
                    </div>
                </div>
            </div>
        </form>

        <div id="token-result" style="display: none;">
            <h2>Token Gerado:</h2>
            <p id="token-text" style="word-wrap: break-word;"></p>
        </div>
        

        <div class="col-sm col-md-8 mx-auto fs-5">

            <section id="introduction"> 
            <h3>Introdução</h3>
            <p>&emsp;&emsp;O token gerado pela API tem autorização apenas para a função de administrador. Para utilizá-lo, adicione no cabeçalho a chave "Authorization" com o valor "Bearer" seguido do token gerado, separados por um espaço. Por exemplo: Bearer TokenGerado.
            </p>
        </section>
        <section id="article">
            <h3>Artigo</h3>
        </section>
        <section id="articleget">
            <h4>/api/posts/</h4>
            
            <h5>&emsp;GET</h5>
            
            <p>&emsp;&emsp; Obtém um artigo utilizando o método GET. 
            </p>
            <h5>&emsp;Parâmetros : </h5>
            <P>&emsp;&emsp;Você pode adicionar os parâmetros category, author (com o valor sendo seu nome de usuário), search (para encontrar palavras no título ou corpo), ou deixar sem parâmetros para obter todos os posts.</P>
            </section>
            <section id="articlepost">
            <h5>&emsp;POST</h5>
            <p>&emsp;&emsp; Adiciona um novo artigo utilizando o método POST, utilizando o corpo do formulário com as chaves "title" e "body" e valores do tipo string, e "category_id" com um valor do tipo inteiro.
            </p>
        </section>
        <h4>/api/posts/{slug}</h4>
        <section id="articleputpatch">
            <h5>&emsp;PUT|PATCH</h5>
            <p>&emsp;&emsp; Atualiza um artigo utilizando o método PUT ou PATCH, utilizando o corpo do formulário do tipo x-www-form-urlencoded com as chaves "title", "body" com valor do tipo string e "category_id" com valor do tipo inteiro. 
            </p>
        </section>
        <section id="articledelete">
            <h5>&emsp;DELETE</h5>
            <p>&emsp;&emsp; Exclui um artigo utilizando o método DELETE. 
            </p>
        </section>
        <section id="category">
            <h3>Categoria</h3>
        </section>
        <section id="categoryget">
            <h4>/api/category/</h4>
            <h5>&emsp;GET</h5>
            <p>&emsp;&emsp; Obtém todas as categorias utilizando o método GET. </p>
        </section>
        <section id="categorypost">
            <h5>&emsp;POST</h5>
            <p>&emsp;&emsp; Adiciona uma nova categoria utilizando o método POST, utilizando o corpo do formulário com a chave "name" e valor do tipo string. 
            </p>
        </section>
        <h4>/api/categories/{slug}</h4>
        <section id="categoryputpatch">
            <h5>&emsp;PUT|PATCH</h5>
            <p>&emsp;&emsp; Atualiza uma categoria utilizando o método PUT ou PATCH, utilizando o corpo do formulário do tipo x-www-form-urlencoded com a chave "name" e valor do tipo string.
        </section>
        <section id="categorydelete">
            <h5>&emsp;DELETE</h5>
            <p>&emsp;&emsp; Exclui uma categoria utilizando o método DELETE. 
            </p>
        </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#token-form').submit(function(event) {
                event.preventDefault();

                var form = $(this);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    success: function(response) {
                        $('#token-text').text(response.authorization.token);
                        $('#token-result').show();
                    },
                    error: function() {
                        alert('Ocorreu um erro durante a geração do token.');
                    }
                });
            });
        });
    </script>
@endsection
