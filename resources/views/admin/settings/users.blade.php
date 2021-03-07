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

<div class="div-btn-create">
    <button class="btn btn-info" id="create"><i class="fas fa-plus"></i></button>
</div>

<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Função</th>
            <th>Ações</th>
        </tr>
    </thead>


    <tbody>
        @foreach($users as $user)
            @if($user->isActive === 1)
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
                        <button 
                            class="btn btn-warning" 
                            btn-edit 
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-func="{{ $user->isAdmin }}"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button type="submit" class="btn btn-primary" btn-delete data-id="{{ $user->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<!-- MODAL FORM -->
<div class="modal fade" role="dialog" id="modal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form action="" method="post">
            <div class="modal-content">

                @csrf

                <!-- Data id -->
                <input type="hidden" value="" id="id">

                <!-- Modal Header  -->
                <div class="modal-header">
                    <h4 class="modal-title" id="id-title-modal"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Message Alert validate -->
                <div class="alert width-alert hide" id="alert-message">
                    <!-- message dynamic here -->
                </div>
                
                <!-- Modal Body  -->
                <div class="modal-body">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Nome</label>
                        <input type="text" id="name" class="form-control" placeholder="Nome...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="office">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Email...">
                    </div> 
                    <div class="form-group mx-sm-3 mb-2 align-checkbox">
                        <label for="func">É um Administrador</label>
                        <input type="checkbox" id="func" name="func" switch="success">
                        <label for="func" data-on-label="Sim" data-off-label="Não"></label>
                    </div> 
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="sector">Senha</label>
                        <input type="password" id="pass" class="form-control" placeholder="Senha...">
                    </div> 
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="address">Confirme a Senha</label>
                        <input type="password" id="confirmPass" class="form-control" placeholder="Confirme a Senha...">
                    </div> 
                </div>

                <!-- Modal Footer  -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="confirm">Confirmar</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
    <script src="{{ asset('js/user/index.js') }}"></script>
@endsection
