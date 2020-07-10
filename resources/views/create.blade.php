@extends('layout')

@section('content')
    <h1>Add new product</h1>
    <hr>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="title" class="form-control" placeholder="Product Name">
        </div>
        <div class="input-group mb-3">
            <input type="text" name="price" class="form-control" placeholder="Product Price">
        </div>
        <div class="input-group mb-3">
            <input type="text" name="color" class="form-control" placeholder="Product Color">
        </div>
        <div class="input-group mb-3">
            <input type="text" name="size" class="form-control" placeholder="Product Size">
        </div>
        <div class="input-group mb-3">
            <select name="catalog_id" id="" class="form-control" >
                @foreach($catalogs as $catalog)
                    <option value="{{ $catalog->id }}">{{ $catalog->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="file" style="display: none;">
            <div class="row no-gutters">
                <div class="col-10">
                    <div class="input-group mb-3">
                        <input type="file" name="picture[]" class="form-control" placeholder="Product Picture">
                    </div>
                </div>
                <div class="col-2">
                    <button class="remove_file btn btn-danger">&times</button>
                </div>
            </div>
        </div>
        <div class="files">
            <div class="input-group mb-3">
                <input type="file" name="picture[]" class="form-control" placeholder="Product Picture">
            </div>
        </div>
        <button id="add_more_files" class="btn btn-warning">Добавить еще файл</button>
        <input type="submit" class="btn btn-primary" value="Создать">
    </form>
    <script>
        $( document ).ready(function() {
            $('#add_more_files').click(function(event){
                event.preventDefault();
                htmlToAppend = $('.file').html();
                $('.files').append(htmlToAppend);

                $('.remove_file').click(function(event){
                    event.preventDefault();
                    $(this).parent().parent().remove();
                });
            });
        });
    </script>
@endsection