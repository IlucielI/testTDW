@extends('layouts/templete_backend')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endsection

@section('contents')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="/admin/addProduct">
                <button type="button" class="btn btn-primary my-3">Add Product</button>
            </a>
        </div>
    </div>
    {{-- <div class="row mb-3">
        <div class="col">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eksporModal">Export</button>
        </div>
    </div> --}}
    <table class="table table-hover table-dark text-center w-100" id="table_id">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td scope="row">{{ $loop->index+1 }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="/admin/detailProduct/{{$product->id}}" class="btn btn-warning d-inline">Detail</a>
                        <a href="/admin/editProduct/{{$product->id}}" class="btn btn-warning d-inline">Edit</a>
                        <button type="button" class="btn btn-danger btn-delete d-inline" data-toggle="modal" data-target="#deleteBackdrop" data-id="{{$product->id}}" data-name="{{$product->name}}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="deleteBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="deleteBackdropLabel">Delete Product</h5>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-warning">Are You Sure ?</h4>
                    <h6 class="text-warning">Delete Product</h6>
                    <h2 class="text-primary" id="nameDelete"></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <form action="/admin/deleteProduct" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
				<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
					$(document).ready(function() {
						$('#table_id').DataTable({
							scrollX: true,
							scrollCollapse: true,
							autoWidth: true,
							paging: true,
						});
						$(".btn-delete").click(function() {
							$("#deleteBackdrop #id").attr('value', $(this).data('id'));
							$("#nameDelete").html($(this).data('name'));
                            console.log($(this).data('name'));
						});
					});
	</script>
@endsection
