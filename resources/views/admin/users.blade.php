@extends('admin.template')

@section('title')
    {{ $title }}
@endsection

@section('head')
    <!-- DataTables -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Admin</th>
            <th>Ações</th>
        </tr>
    </thead>


    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->isAdmin == 1)
                        <span class="alert alert-dark color-span">Admin</span>
                    @else
                        <span class="alert alert-info color-span pd-right">Aluno</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning" data-id="{{ $user->id }}">
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button type="submit" class="btn btn-primary" data-id="{{ $user->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
@endsection
