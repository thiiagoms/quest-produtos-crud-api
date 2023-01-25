<x-layout title="Informações do Produto">
    <style>
        .responsive {
            width: 100%;
            height: auto;
        }
    </style>
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top responsive" src="{{ url("products/$product->img_path") }}" height="600px">
                    </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-5">
                        Preço: <span class="text-decoration-line-through">R$ {{ $product->price }}</span>
                    </div>
                    <p class="lead">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
