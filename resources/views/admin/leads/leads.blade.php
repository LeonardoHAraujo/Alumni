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

<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Empresa</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>País</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach($leads as $lead)
            @if($lead->isActive === 1)
                <tr>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->lastName }}</td>
                    <td>{{ $lead->company }}</td>
                    <td>{{ $lead->city }}</td>
                    <td>{{ $lead->state }}</td>
                    <td>{{ $lead->country }}</td>
                    <td>
                        <button 
                            class="btn btn-success"
                            btn-view 
                            data-id="{{ $lead->id }}"
                            data-name="{{ $lead->name }}"
                            data-lastName="{{ $lead->lastName }}"
                            data-company="{{ $lead->company }}"
                            data-linkedin="{{ $lead->linkedin }}"
                            data-formation="{{ $lead->formation }}"
                            data-contactPoint="{{ $lead->contactPoint }}"
                            data-dateFirstContact="{{ $lead->dateFirstContact }}"
                            data-cell="{{ $lead->cell }}"
                            data-telephone="{{ $lead->telephone }}"
                            data-email="{{ $lead->email }}"
                            data-emailSecondary="{{ $lead->emailSecondary }}"
                            data-city="{{ $lead->city }}"
                            data-state="{{ $lead->state }}"
                            data-country="{{ $lead->country }}"
                        >
                            <i class="fas fa-eye"></i>
                        </button>

                        <button 
                            class="btn btn-warning" 
                            btn-edit 
                            data-id="{{ $lead->id }}"
                            data-name="{{ $lead->name }}"
                            data-lastName="{{ $lead->lastName }}"
                            data-company="{{ $lead->company }}"
                            data-linkedin="{{ $lead->linkedin }}"
                            data-formation="{{ $lead->formation }}"
                            data-contactPoint="{{ $lead->contactPoint }}"
                            data-dateFirstContact="{{ $lead->dateFirstContact }}"
                            data-cell="{{ $lead->cell }}"
                            data-telephone="{{ $lead->telephone }}"
                            data-email="{{ $lead->email }}"
                            data-emailSecondary="{{ $lead->emailSecondary }}"
                            data-city="{{ $lead->city }}"
                            data-state="{{ $lead->state }}"
                            data-country="{{ $lead->country }}"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button type="submit" class="btn btn-primary" btn-delete data-id="{{ $lead->id }}">
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
                        <label for="name">Sobrenome</label>
                        <input type="text" id="lastName" class="form-control" placeholder="Sobrenome...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Empresa</label>
                        <input type="text" id="company" class="form-control" placeholder="Empresa...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">LinkedIn</label>
                        <input type="text" id="linkedin" class="form-control" placeholder="LinkedIn...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Formação</label>
                        <input type="text" id="formation" class="form-control" placeholder="Formação...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Ponto de contato</label>
                        <input type="text" id="contactPoint" class="form-control" placeholder="Ponto de contato...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Data do primeiro contato</label>
                        <input type="date" id="dateFirstContact" class="form-control" placeholder="Data...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Celular</label>
                        <input type="text" id="cell" class="form-control" placeholder="Celular...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Telefone</label>
                        <input type="text" id="telephone" class="form-control" placeholder="Telefone...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="E-mail...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">E-mail Secundário</label>
                        <input type="email" id="emailSecondary" class="form-control" placeholder="E-mail Secundário...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Cidade</label>
                        <input type="text" id="city" class="form-control" placeholder="Cidade...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">Estado</label>
                        <input type="text" id="state" class="form-control" placeholder="Estado...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name">País</label>
                        <input type="text" id="country" class="form-control" placeholder="País...">
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

<!-- MODAL VIEW DATA -->
<div id="modal-view" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content custom-modal">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Visualização do(a) Lead <b><span id="nameLead"> <!-- Dynamic name here --> </span></b> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Nome</label>
                        <input type="text" id="nameView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Sobrenome</label>
                        <input type="text" id="lastNameView" class="form-control" data-disabled>
                    </div>
                </div>
                
                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Empresa</label>
                        <input type="text" id="companyView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">LinkedIn</label>
                        <input type="text" id="linkedinView" class="form-control" data-disabled>
                    </div>
                </div>
                
                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Formação</label>
                        <input type="text" id="formationView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Ponto de contato</label>
                        <input type="text" id="contactPointView" class="form-control" data-disabled>
                    </div>
                </div>
                
                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Data do primeiro contato</label>
                        <input type="text" id="dateFirstContactView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Celular</label>
                        <input type="text" id="cellView" class="form-control" data-disabled>
                    </div>
                </div>

                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Telefone</label>
                        <input type="text" id="telephoneView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">E-mail</label>
                        <input type="text" id="emailView" class="form-control" data-disabled>
                    </div>
                </div>

                
                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">E-mail Secundário</label>
                        <input type="text" id="emailSecondaryView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Cidade</label>
                        <input type="text" id="cityView" class="form-control" data-disabled>
                    </div>
                </div>

                <div class="divs-view">
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">Estado</label>
                        <input type="text" id="stateView" class="form-control" data-disabled>
                    </div>
                    <div class="form-group mx-sm-3 mb-2 width-input-view">
                        <label for="name">País</label>
                        <input type="text" id="countryView" class="form-control" data-disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Friendly alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/customer.min.js') }}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/buttons.colVis.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>

    <!-- export to Excel -->
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script> 

    <!-- My script -->
    <script src="{{ asset('js/leads/leads.js') }}"></script>
@endsection