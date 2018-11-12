<div style="position: relative;bottom:8px;">

@include('Modal.Album')
</div>
<main>

      <section class="cards" id="cartas">



        @foreach ($Album as $key => $Album)
          <article>
            <a href="/Album/{{ $Album->slug_album }}">
            <img class="article-img" src="/storage/img/download.png" alt=" " />
            <h1 class="article-title">
              {{$Album->nombre  }}
            </h1>
          </a>
<button  onclick="Eliminar('{{$Album->id_album}}','{{$Album->nombre}}')" class="btn btn-danger" >Eliminar</button>
<button OnClick='Mostrar({{$Album->id_album}});' data-toggle='modal' data-target='#myModal' class="btn btn-primary">Editar</button>
          </article>
        @endforeach
      </section>
    </main>
