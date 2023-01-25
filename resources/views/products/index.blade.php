<x-layout title="Lista de Produtos">

    <div class="jumbotron">
        <h1 class="display-4">Lista de Produtos</h1>
        <hr class="my-4">
        <p>Listagem de todos os produtos cadastrados</p>
    </div>
    <a href="{{ route('product.create') }}" class="btn btn-dark mb-2">Cadastrar Produto</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Preço</th>
                <th scope="col">Imagem</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td>R$ {{ $product->price }}</td>
                    <td>
                        <img src="{{ url("products/$product->img_path") }}" class="img-thumbnail" height="100px"
                            width="100px">
                    </td>
                    <td>
                        <span class="d-flex">
                            <a href="{{ route('product.show', ['id' => $product->id]) }}"
                                class="btn btn-success btn-sm mr-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                class="btn btn-primary btn-sm mr-1">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
    <div class="mb-4">

    </div>
</x-layout>
