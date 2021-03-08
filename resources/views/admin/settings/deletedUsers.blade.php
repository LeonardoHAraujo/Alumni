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
@csrf

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Função</th>
            <th>Reativar</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
            @if($user->isActive === 0)
                <tr>
                    <td>{{ $user->name }} {{ $user->lastName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->isAdmin == 1)
                            <span class="alert alert-dark color-span">Admin</span>
                        @else
                            <span class="alert alert-info color-span pd-right">Aluno</span>
                        @endif
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success waves-effect waves-light" btn-reactivate data-id="{{ $user->id }}">
                            <i class="fas fa-users"></i>
                        </button>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
    <!-- Friendly alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>

    <!-- My script -->
    <script src="{{ asset('js/user/deletedUser.js') }}"></script>
@endsection