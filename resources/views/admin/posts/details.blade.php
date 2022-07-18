<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>CRUD - {{$post->title}}</title>
</head>
<style>
  body {
    margin: 0;
    padding: 0;
  }

  main {
    padding: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  p {
    line-height: 1rem;
    margin: 0;
    margin-bottom: 0.5rem;
  }

  .post {
    display: flex;
    flex-direction: column;
    justify-content: left;
    align-items: left;
    text-align: left;
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
  }

  h3 {
    font-size: 1.5rem;
    margin: 0;
    line-height: 1rem;
    top: calc(-1rem);
  }

  .container {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    max-width: 30rem;
    min-width: 20rem;
  }

  .form {
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }

  .error {
    color: salmon;
  }

  .card-header {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }

  .card-header .post-info {
    display: flex;
    flex-direction: column;
  }

  .buttons-container {
    display: flex;
    flex-direction: row;
    gap: 0.5rem;
  }

  .buttons-container .btn-primary {
    background-color: transparent;
    color: black;
    border: solid 2px rgba(13, 110, 253, 0.2);
  }

  .buttons-container .btn-success {
    background-color: transparent;
    color: black;
    border: solid 2px rgba(20, 108, 67, 0.2);
  }

  .buttons-container .btn-danger {
    background-color: transparent;
    color: black;
    border: solid 2px rgba(220, 53, 69, 0.2);
  }

  .buttons-container button:hover {
    filter: brightness(0.98);
  }
</style>

<body>
  <main>
    <div class="container">
      <div id="post-{{$post->id}}" class="card post">
        <div class="card-header">
          <div class="post-info">
            <h3>{{$post->title}}</h3>
          </div>
          <div class="buttons-container">
            <form action="{{route('posts.edit', $post->id)}}" method="get">
              <button type="submit" class="btn btn-primary">Editar</button>
            </form>
            <form action="{{ route('posts.delete', $post->id) }}" method="post">
              <input type="hidden" value="{{ csrf_token() }}" name="_token" />
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="btn btn-danger">Excluir Post</button>
            </form>
          </div>
        </div>
        <div class="card-body">
          <p>{{$post->content}}</p>
        </div>
      </div>
      <a href="{{route('posts.index')}}" style="width: 100%; display: flex; justify-content: center;">
        <button type="button" class="btn btn-primary" style="width: 100%;">Voltar</button>
      </a>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>