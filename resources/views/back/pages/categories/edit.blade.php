@extends('back.layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Modifier une catégorie')

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
                    Modifier une catégorie
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
        <div class="row row-cards">

            <div class="col-lg-8">

                <form class="card" action="{{ route('category.update',$category) }}" method="POST" enctype="multipart/form-data" >

                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h3 class="card-title">Formulaire</h3>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label required">Nom de la categorie</label>
                            <input id="name" value="{{ $category->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Le nom de votre catégorie" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Couleur de la categorie</label>
                            <div class="card-subtitle mt-3 mb-3 info">Choisissez une valeur exadécimale.</div>
                            <input id="color" value="{{ $category->color }}" name="color" type="color" pattern="^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$" class="form-control @error('color') is-invalid @enderror" placeholder="La couleur de votre catégorie" autofocus>

                            @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-label required">Changer l'image mise en avant</div>
                            <div class="card-subtitle mt-3 mb-3 info">Choisissez une image verticale (2000 x 2600) de bonne qualité et de taille légère pour un affichage optimal.</div>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept=".jpg,.jpeg,.png" onchange="validateFileType()" autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Description</label>
                            <div class="card-subtitle mt-3 mb-3 info">Maxi 205 caractères pour un affichage optimal. (<span id="char-count">0</span> caractères)</div>

                            <textarea rows="4" name="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="La description inspirante de votre catégorie" autofocus>{{ trim($category->desc) }}</textarea>

                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary ms-auto" type="submit">
                            Mettre a jour
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    function validateFileType() {
        var fileName = document.getElementById("image").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile == "jpg" || extFile == "jpeg" || extFile == "png") {
            //TO DO
        } else {
            alert("Seuls les fichiers JPG / JPEG et PNG sont autorisés!");
        }
    }
</script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        let options = {
            selector: '#tinymce-mytextarea',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }
        tinyMCE.init(options);
    })
    // @formatter:on
</script>


<script>
    const textarea = document.querySelector('textarea[name="desc"]');
    const charCountDisplay = document.getElementById('char-count');
    const maxCharCount = 205;

    textarea.addEventListener('input', function() {
        const charCount = this.value.length;
        charCountDisplay.textContent = charCount;

        if (charCount > maxCharCount) {
            this.value = this.value.slice(0, maxCharCount);
        }
    });
</script>

@endsection