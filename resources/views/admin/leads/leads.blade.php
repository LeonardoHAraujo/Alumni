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
<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Empresa</th>
            <th>LinkedIn</th>
            <th>Formação</th>
            <th>Ponto de Contato</th>
            <th>Data de Contato</th>
            <th>Celular</th>
            <th>Telefone</th>
            <th>Emails</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>País</th>
        </tr>
    </thead>

    <tbody>
        @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->lastName }}</td>
                <td>{{ $lead->company }}</td>
                <td>{{ $lead->linkedin }}</td>
                <td>{{ $lead->formation }}</td>
                <td>{{ $lead->contactPoint }}</td>
                <td>{{ $lead->dateFirstContact }}</td>
                <td>{{ $lead->cell }}</td>
                <td>{{ $lead->telephone }}</td>
                <td>{{ $lead->email }} <br> {{ $lead->emailSecondary }}</td>
                <td>{{ $lead->city }}</td>
                <td>{{ $lead->state }}</td>
                <td>{{ $lead->country }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table id="oi" class="hide"></table>
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