@extends('layouts.master')

@section('title')
    <title>Transaksi</title>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content" id="dw">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        @card
                            @slot('title')
                            Produk
                            @endslot

                            <div class="row">
                                <div class="col-md-4">
                                    <form action="#" @submit.prevent="addToCart" method="post">
                                        <div class="form-group">
                                            <label for="">Produk</label>
                                            <select name="product_id" id="product_id"
                                                v-model="cart.product_id"
                                                class="form-control" required width="100%">
                                                <option value="">Pilih</option>
                                                @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Qty</label>
                                            <input type="number" name="qty"
                                                v-model="cart.qty" 
                                                id="qty" value="1" 
                                                min="1" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm"
                                                :disabled="submitCart"
                                                >
                                                <i class="fa fa-shopping-cart"></i> @{{ submitCart ? 'Loading...':'Tambah ke keranjang' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-5">
                                    <b>Detail Produk</b>
                                    
                                        <table class="table table-stripped">
                                            <tr>
                                                <th>Kode</th>
                                                <td>:</td>
                                                <div v-if="product.code">
                                                <td>@{{ product.code }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <th width="3%">Produk</th>
                                                <td width="2%">:</td>
                                                <div v-if="product.name">
                                                <td>@{{ product.name }}</td>
                                                </div>
                                            </tr>
                                            <tr>
                                                <th>Harga</th>
                                                <td>:</td>
                                                <div v-if="product.price">
                                                <td>@{{ product.price | currency }}</td>
                                                </div>
                                            </tr>
                                        </table>
                                    
                                </div>
                                <div class="col-md-3" v-if="product.photo">
                                    <img :src="'/uploads/product/' + product.photo" 
                                        height="150px" 
                                        width="150px" 
                                        :alt="product.name">
                                </div>
                            </div>
                            @slot('footer')

                            @endslot
                        @endcard
                    </div>
                    @include('orders.cart')
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection