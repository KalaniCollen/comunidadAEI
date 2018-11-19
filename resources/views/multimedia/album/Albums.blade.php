<div style="position: relative;bottom:8px;">

    @include('Modal.Album')
</div>
<main>

    <section class="cards" id="cartas">



        @foreach ($Album as $key => $Album)
            <article>
                <a href="/album/{{ $Album->slug_album }}">
                    <img class="article-img" src="/storage/img/download.png" alt=" " />
                    <h1 class="article-title">
                        {{ $Album->nombre  }}
                    </h1>
                </a>

                <button type="button" class="btn btn--success js-album-delete" data-token="{{ csrf_token() }}" data-slug="{{ $Album->slug_album }}">Eliminar</button>
                <button OnClick='Mostrar({{$Album->id_album}});' data-toggle='modal' data-target='#myModal' class="btn btn-primary">Editar</button>
            </article>
        @endforeach
    </section>
</main>
