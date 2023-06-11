@extends('/tenant_page.tenant_template')

@section('content')
<div class="div-container">
    <div class="konten">
        <div class="dashboard">
            <p class="text-dashboard"><strong>Dashboard</strong></p>
        </div>
        <div class="isi">
            <div class="column">
                <div class="id">
                   <p><strong>ID</strong></p>
                </div>
                <div class="menu">
                    <p><strong>Menu</strong></p>
                </div>
                <div class="stock">
                    <p><strong>Stock</strong></p>
                </div>
                <div class="action">
                    <p><strong>Action</strong></p>    
                </div>
            </div>
            <div>
                <hr class="garis">
            </div>
            <div class="makanan">
                @foreach ($menus as $menu)
                <div class="nama-makanan">
                    <div class="id">
                        <p><strong>{{ $menu->id }}</strong></p>
                    </div>
                    <div class="menu">
                        <p><strong>{{ $menu->name }}</strong></p>
                    </div>
                    <div class="stock">
                        <p><strong>{{ $menu->stock }}</strong></p>
                        <i class="fa-solid fa-pencil"></i>
                    </div>
                    <div class="action">
                        <i id="iconeye" class="fa-solid fa-eye"></i> 
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="add">
                <div class="add-button">
                    <p class="text-add"><strong>+ Add New Product</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{asset('css/tenanthome.css')}}" rel="stylesheet" />
@endpush