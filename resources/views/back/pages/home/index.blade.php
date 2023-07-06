@extends('back.layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tableau de bord')

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
                    Tableau de bord
                </h2>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">

            <div class="col-12">
                <div class="card card-md">
                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-primary">

                            <svg xmlns="" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                <path d="M10 10l.01 0" />
                                <path d="M14 10l.01 0" />
                                <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                            </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="h1">{{ config('app.name') }}</h3>
                                <div class="markdown text-muted">
                                    Heureux de vous revoir, {{ Auth::user()->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="row row-cards">

                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                <path d="M7 8h10"></path>
                                                <path d="M7 12h10"></path>
                                                <path d="M7 16h10"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            @if($posts_count == 1)
                                            Vous avez {{ $posts_count }} article publié
                                            @elseif($posts_count > 1)
                                                Vous avez {{ $posts_count }} Article(s) publié(s)
                                            @else
                                                Vous n'avez aucun article publié
                                            @endif
                                        
                                        </div>
                                        <div class="text-muted">
                                            Consultez <a class="" href="{{ route('posts.index') }}">vos publications</a>
                                            ou ajoutez un <a class="" href="{{ route('post.create') }}"> nouvel article</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-facebook text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 4h6v6h-6z"></path>
                                                <path d="M14 4h6v6h-6z"></path>
                                                <path d="M4 14h6v6h-6z"></path>
                                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">

                                            @if($category_count == 1)
                                                {{ $category_count }}e catégorie publiée
                                            @elseif($category_count > 1)
                                                {{ $category_count }} Catégorie(s) publiée(s)
                                            @else
                                                Aucune catégorie disponible
                                            @endif

                                        </div>
                                        <div class="text-muted">
                                            Créez une <a class="" href="{{ route('category.create') }}">catégorie</a>
                                            ou consultez la <a class="" href="{{ route('categories.index') }}">liste des catégories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Auth::check() && Auth::user()->role == 1)

                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                                <path d="M7 8h10"></path>
                                                <path d="M7 12h10"></path>
                                                <path d="M7 16h10"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            @if($draft_posts_count == 1)
                                                {{ $draft_posts_count }} article a valider
                                            @elseif($draft_posts_count > 1)
                                                {{ $draft_posts_count }} Article(s) sont a valider
                                            @else
                                                Aucun article a valider
                                            @endif
                                        
                                        </div>
                                        <div class="text-muted">
                                            @if($draft_posts_count > 0)
                                            Consultez les publications pour <a class="" href="{{ route('alluserposts.index') }}"> valider les articles</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-purple text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                             </svg>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">

                                            @if($users_count == 1)
                                                {{ $users_count }} éditeur actif
                                            @elseif($users_count > 1)
                                                {{ $users_count }} éditeur(s)
                                            @else
                                                Aucun éditeur disponible
                                            @endif

                                        </div>
                                        <div class="text-muted">
                                            Voir la liste des <a class="" href="{{ route('editors.index') }}"> éditeurs</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif


                </div>
            </div>

            @if ($posts->count() > 0)
                <div class="col-lg-6">
                    <div class="row row-cards">
                    <div class="col-12">
                        <div class="card" style="height: 20rem">

                        <div class="card-header border-0">
                            <div class="card-title">Activités récentes</div>
                        </div>

                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">

                             @foreach ($posts as $post)
                                <div>
                                    
                                    <div class="row">
                                            <div class="col-auto">
                                                <span class="avatar" 
                                                style="background-image: url({{ $post->user->image ? asset('/storage/'.$post->user->image) : '/front/images/avatars/user.png' }})">
                                                </span>
                                            </div>

                                            <div class="col">
                                                <div class="text-truncate">

                                                    @if (Auth::check() && $post->user_id === Auth::user()->id)
                                                        Vous avez
                                                    @else
                                                    <strong>{{ $post->user->name }}</strong> a
                                                    @endif
                                                        
                                                    @if ($post->state === 'brouillon')
                                                        publié un <strong>brouillon</strong> :
                                                    @else
                                                        publié
                                                    @endif

                                                    <a href="{{ route('post.detail', $post->slug) }}">{{ $post->title }}</a>
                                                    
                                                </div>
                                                
                                                <div class="text-muted">{{ $post->created_at->diffForHumans() }} dans <strong><a class="badge" style="background-color: {{ $post->category->color}}" href="{{ route('category.detail', $post->category->slug)}}">{{ $post->category->name}}</a></strong></div>
                                            </div>
                                        </div>
                                    
                                </div>
                            @endforeach

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection