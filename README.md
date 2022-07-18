# Iniciando projeto
- Um projeto simples de CRUD com Laravel 8.

## Utilizo o VS Code.
- Versão do PHP: 8.1.8

## Criando o projeto com Laravel:
```
composer create-project laravel/laravel="8.*" CRUD_portalemprega+
cd CRUD_portalemprega+
```

## Sincronizando com o banco de dados
Abri um banco de dados PostgreSQL utilizando o serviço railway para hospedar gratuitamente em caso de uso para estudos e desenvolvimento.

Logo após sincronizei com a aplicação por meio das variáveis de ambiente.

## Abrindo o projeto
```
php artisan serve
```

## Primeiras ações

- Criei os models e as migrations de posts e users com seus respectivos campos (id, título, conteúdo e etc).
- Ajustei os models de acordo com as necessidades de suas informações.

```
php artisan migrate
```
[...] felizmente, após algumas tentativas deu bom.

## Iniciando CRUD

### READ

- Iniciando o controller dos posts com a rota GET.

- Fiz uma estilização simples na rota principal, utilizando Bootstrap e CSS puro.

- Dentro da view utilizei o foreach para renderizar os dados vindos da API:

```PHP
@foreach($posts as $post)
  <div>...
@endforeach
```
### CREATE

- Na rota POST foi possível fazer com que as postagens fossem enviadas e armazenadas no banco de dados.

- O método recebe a requisição, e utiliza o comando

```php
Post::create([])
```

recebendo os dados necessários do formulário, e enviando-os para o banco de dados.

- Logo após é exibida uma mensagem avisando sucesso.

### DELETE

- Na rota de exclusão recebemos o id enviado na requisição.

```php
public function delete($id){}
```

- Com ele, fazemos com que o programa procure no banco de dados o post onde o ID é igual ao da requisição, ao mesmo tempo que verificamos se o post existe para não haver imprevistos.

```php
if(!$post = Post::where('id', $id)->first()) {
  return redirect()->route('posts.index');
}
```

- Caso não exista, retornaremos a view da tela inicial, mas caso exista:

```php
$post->delete();
return redirect()
  ->route('posts.index')
  ->with('message', 'Post excluído com sucesso.');
```

- É realizada a exclusão, e uma mensagem de sucesso é enviada ao usuário.

### UPDATE

- Na rota PUT, assim como na POST precisamos dos dados da requisição, com adicional do ID do item a ser atualizado.

- Também realizamos a verificação da existencia do item, como em todos os outros métodos.

```php
public function update(PostCreateUpdate $request, $id){
  if(!$post = Post::where('id', $id)->first()) {
    return redirect()->route('posts.index');
  }

  $post->update([
    'title' => $request->title,
    'content' => $request->content,
    'updated_at' => date(now()),
    'who_posted' => 'admin'
  ]);

  return redirect()
    ->route('posts.index')
    ->with('message', 'Post editado com sucesso.');
}
```

## Sobre o funcionamento das rotas

```php
GET localhost:8000/posts/ // -> Entrega a lista completa de posts.
POST localhost:8000/posts/ // -> Faz a postagem dos dados no banco.
PUT localhost:8000/posts/{id} // -> Faz a edição do item pedido de acordo com os dados da requisição.
DELETE localhost:8000/posts/{id} // -> Faz a remoção da informação do banco de dados.

// Views
GET localhost:8000/posts/{id} // -> Mostra post específico.
GET localhost:8000/posts/{id}/edit/ // -> Mostra a interface para edição do post.


```

## Considerações finais

- Achei Laravel uma ferramente altamente intuitiva e fácil, ainda mais pra mim que sou iniciante na linguagem PHP e comecei a estudar ela na última semana, achei bacana e fácil de se trabalhar, pro meu caso que vivo no JS. Espero em breve poder desenvolver projetos maiores e adquirir mais conhecimentos em PHP e Laravel.

- Também contei com a ajuda de cursos e foruns na internet, que contribuiram bastante para o meu entendimento acerca das diferenças entre o PHP e o JS, e do funcionamento em si.

- O projeto é bem simples, gostaria de implementar inclusive um sistema de autenticação, mas para o meu primeiro projeto em Laravel, eu acho que quebrou o galho rsrs.

- Valeu, galera!