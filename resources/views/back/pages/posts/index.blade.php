@extends('back.layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Articles')

@section('header')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Aperçu
                </div>
                <h2 class="page-title">
                    Gestion des articles
                </h2>
            </div>

            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                  <a href="{{ route('post.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                    Nouvel article
                  </a>
                  <a href="{{ route('post.create')}}" class="btn btn-primary d-sm-none btn-icon" aria-label="Nouvel article">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                  </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            @if (session('status'))
            <div class="alert alert-success" style="display: flex;justify-content: center;">
                {{ session('status') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger" style="display: flex;justify-content: center;">
                {{ session('error') }}
            </div>
            @else
            @endif

            <div class="col-lg-12">
                <div class="card card-md">
                    @if ($posts->count() > 0)
                        <div class="card-body">
                            <div id="table-default" class="table-responsive">

                                <table class="table" style="vertical-align: middle">
                                    <thead>
                                        <tr>
                                            <th><button class="table-sort" data-sort="sort-title">Titre</button></th>
                                            <th><button class="table-sort" data-sort="sort-category">Catégorie</button></th>
                                            <th><button class="table-sort" data-sort="sort-state">Etat</button></th>
                                            <th><button class="table-sort" data-sort="sort-date">Mise a jour</button></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-tbody">
                                        @foreach ($posts as $post)
                                        <tr>
                                            <td class="sort-title">{{ $post->title }}</td>
                                            <td class="sort-category"><a class="badge" style="background-color: {{ $post->category->color}}" href="{{ route('category.detail', $post->category->slug)}}">{{ $post->category->name}}</a></td>
                                            <td class="sort-state">
                                                @if ($post->state === 'brouillon')
                                                    <span class="badge bg-yellow-lt">soumis</span>
                                                @else
                                                    <span class="badge bg-green-lt">validé</span>
                                                @endif
                                            </td>
                                            <td class="sort-date" data-date="{{ $post->created_at }}">{{ $post->created_at->format('d M Y') }}</td>
                                            
                                            <td>
                                                <div class="btn-list flex-nowrap">

                                                    @if ($post->state === 'brouillon' && $post->user->role === 1)
                                                        <a href="{{ route('post.detail', $post->slug) }}" class="btn btn-indigo w-100">
                                                            <svg xmlns="" class="icon icon-tabler icon-tabler-eye-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                                <path d="M11.192 17.966c-3.242 -.28 -5.972 -2.269 -8.192 -5.966c2.4 -4 5.4 -6 9 -6c3.326 0 6.14 1.707 8.442 5.122"></path>
                                                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                                            </svg>
                                                            Voir et valider
                                                        </a>
                                                    @else
                                                        <a href="{{ route('post.detail', $post->slug) }}" class="btn btn-teal w-100">
                                                            <svg xmlns="" class="icon icon-tabler icon-tabler-eye-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                                <path d="M11.192 17.966c-3.242 -.28 -5.972 -2.269 -8.192 -5.966c2.4 -4 5.4 -6 9 -6c3.326 0 6.14 1.707 8.442 5.122"></path>
                                                                <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                                            </svg>
                                                            Voir
                                                        </a>
                                                    @endif

                                                    <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-purple w-100 btn-icon">
                                                        <svg xmlns="" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                            <path d="M16 5l3 3"></path>
                                                        </svg>
                                                    </a>

                                                    <a href="{{ route('post.destroy', $post) }}" class="btn btn-pink w-100 btn-icon">

                                                        <svg xmlns="" class=" icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 7l16 0"></path>
                                                            <path d="M10 11l0 6"></path>
                                                            <path d="M14 11l0 6"></path>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                        <form action="{{ route('post.destroy', $post) }}" method="post">
                                                            @csrf
                                                            @method('POST')
                                                        </form>
                                                    </a>
                                                    
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>  
                        </div>
                    @else

                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-primary">

                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                <path d="M7 8h10"></path>
                                <path d="M7 12h10"></path>
                                <path d="M7 16h10"></path>
                             </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-10">
                            <h3 class="h1">Vous n'avez aucun article disponible.</h3>
                            <div class="markdown text-muted">
                                &#128543; Ajoutez un nouvel article .
                            </div>

                        </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('modals')
@endsection

@section('scripts')

<script src="/back/dist/libs/list.js/dist/list.min.js?1674944402" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const list = new List('table-default', {
            sortClass: 'table-sort',
            listClass: 'table-tbody',
            valueNames: [ 'sort-title', 'sort-category', 'sort-state',
                { attr: 'data-date', name: 'sort-date' }
            ]
        });
    })
</script>


@endsection