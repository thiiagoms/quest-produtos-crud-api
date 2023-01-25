<x-layout title="Editar Produto">
    <div class="jumbotron">
        <h1 class="display-4">Atualizar Produto</h1>
        <hr class="my-4">
        <p>Formulário para atualizar os dados do produto {{ $product->name }}</p>
    </div>
    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label for="productName" class="col-sm-2 col-form-label">Nome do Produto</label>
            <div class="col-sm-10">
                <input type="text" id="productName" name="productName" class="form-control" value="{{ $product->name }}"
                    placeholder="Informe o nome do produto">
            </div>
        </div>
        <div class="row mb-3">
            <label for="productPrice" class="col-sm-2 col-form-label">Preço do produto</label>
            <div class="col-sm-10">
                <input type="number" id="productPrice" name="productPrice" class="form-control"
                    value="{{ $product->price }}" placeholder="Informe o preço do produto">
            </div>
        </div>
        <div class="row mb-3">
            <label for="productDescription" class="col-sm-2 col-form-label">Descrição do produto</label>
            <div class="col-sm-10">
                <textarea class="form-control" row="3" id="productDescription" name="productDescription"
                    placeholder="Informe a descrição do produto" >{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="productImage" class="col-sm-2 col-form-label">Imagem do produto</label>
            <div class="col-sm-10">
                <input type="file" id="productImage" name="productImage" class="form-control"
                    placeholder="Informe o preço do produto" value="{{ $product->img_path }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
