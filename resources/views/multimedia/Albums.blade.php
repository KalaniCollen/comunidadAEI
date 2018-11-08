<div style="position: relative;bottom:8px;">

@include('Modal.Album')
</div>
<main>

      <section class="cards">



        @foreach ($Album as $key => $Album)
          <article>
            <a href="/Album/{{ $Album->Slug_Album }}">
            <img class="article-img" src="/storage/Img/download.png" alt=" " />
            <h1 class="article-title">
              {{$Album->Nombre  }}
            </h1>
          </a>
{{-- <button >Eliminar</button>
<button>Editar</button> --}}
          </article>
        @endforeach
      </section>
    </main>
