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

                <form class="card" action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h3 class="card-title">Formulaire</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Nom du produit</label>
                            <input id="nom" value="{{ $product->nom }}" name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" placeholder="Le nom de votre produit" autofocus>
                            @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label required">Description</label>
                            <textarea rows="4" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="La description de votre produit" autofocus>{{ $product->description }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label required">Stock</label>
                            <input id="stock" value="{{ $product->stock }}" name="stock" type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Le stock disponible" autofocus>
                            @error('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label required">Prix</label>
                            <input id="prix" value="{{ $product->prix }}" name="prix" type="number" step="0.01" class="form-control @error('prix') is-invalid @enderror" placeholder="Le prix du produit" autofocus>
                            @error('prix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Image du produit</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept=".jpg,.jpeg,.png" autofocus>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-primary ms-auto" type="submit">
                            Mettre à jour
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