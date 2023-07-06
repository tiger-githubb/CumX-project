@extends('back.layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Editeurs')

@section('header')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Editeurs
          </h2>
          <div class="text-muted mt-1"> {{$editeurs->count()}} personnes</div>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="page-body">
    <div class="container-xl">

      <div class="row row-cards">

        @if ($editeurs->count() > 0)

            @foreach ($editeurs as $editeur)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        <span class="avatar avatar-xl mb-3 rounded" style="background-image: url({{ $editeur->image ? asset('/storage/'.$editeur->image) : '/front/images/avatars/user.png' }})">
                                  
                        </span>

                        <h3 class="m-0 mb-1"><a>{{ $editeur->name }}</a></h3>

                        @if($editeur->role == 1)
                            <div class="text-muted">Administrateur</div>
                        @elseif($editeur->role == 0)
                            <div class="text-muted">Editeur</div>
                        @endif
                        
                        <div class="mt-3">
                            @if ($editeur->state === 'actif')
                                <span class="badge bg-green-lt">compte {{ $editeur->state }}</span>
                            @elseif ($editeur->state === 'inactif')
                                <span class="badge bg-purple-lt">compte {{ $editeur->state }}</span>
                            @endif
                        </div>


                    </div>

                    <div class="d-flex">

                        <a href="mailto:{{ $editeur->email }}" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M3 7l9 6l9 -6" /></svg>
                            email
                        </a>
                        <a href="tel:" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                            Appeler
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        @else

            <div class="card-stamp card-stamp-lg">
                <div class="card-stamp-icon bg-primary">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                    </svg>
                </div>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col-10">
                    <h3 class="h1">Aucun éditeur disponible.</h3>
                    <div class="markdown text-muted">
                        &#128543; Invitez vos amis a s'inscrire sur {{ config('app.name') }} .
                    </div>

                </div>
                </div>
            </div>

        @endif

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