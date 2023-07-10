@extends('back.layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Produits')

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
                    Gestion des Produits
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('product.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Nouveau produit
                        <a href="{{ route('product.create')}}" class="btn btn-primary d-sm-none btn-icon" aria-label="Nouvelle catégorie">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        </a>
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

                    @if($products->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Produits</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr>
                                        <td><a class="badge">{{ $product->nom }}</a></td>

                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                 {{-- <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-teal w-100">
                                                    <svg xmlns="" class="icon icon-tabler icon-tabler-eye-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                        <path d="M11.143 17.961c-3.221 -.295 -5.936 -2.281 -8.143 -5.961c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6c-.222 .37 -.449 .722 -.68 1.057"></path>
                                                        <path d="M15 19l2 2l4 -4"></path>
                                                    </svg>
                                                    Voir
                                                </a> --}}

                                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-purple w-100 btn-icon">
                                                    <svg xmlns="" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>
                                                </a> 

                                                <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-pink w-100 btn-icon">

                                                    <svg xmlns="" class=" icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>

                                                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
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
                    @else

                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4h6v6h-6z"></path>
                                <path d="M14 4h6v6h-6z"></path>
                                <path d="M4 14h6v6h-6z"></path>
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                             </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-10">
                            <h3 class="h1">Vous n'avez aucun produit disponible.</h3>
                            <div class="markdown text-muted">
                                &#128400; Ajoutez un produits .
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

@endsection