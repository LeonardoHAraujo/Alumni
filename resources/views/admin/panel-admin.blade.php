@extends('admin.template')

@section('title')
    {{ $title }}
@endsection

@section('welcome')
    Bem vindo à página principal
@endsection


@section('content')
    <div class="row center-cards">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat position-relative width-card">
                <div class="card-body">
                    <div class="mini-stat-desc">
                        <h6 class="text-uppercase verti-label text-white-50">Leads</h6>
                        <div class="text-white">
                            <h6 class="text-uppercase mt-0 text-white-50">Leads</h6>
                            <h3 class="mb-3 mt-0">{{ $countLeads }}</h3>
                            <div class="">
                                <!--<span class="badge badge-light text-info"> +11% </span>--> <span class="ml-2">Número de Leads do sistema</span>
                            </div>
                        </div>
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-cube-outline display-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat position-relative width-card">
                <div class="card-body">
                    <div class="mini-stat-desc">
                        <h6 class="text-uppercase verti-label text-white-50">Usuarios</h6>
                        <div class="text-white">
                            <h6 class="text-uppercase mt-0 text-white-50">Usuarios</h6>
                            <h3 class="mb-3 mt-0">{{ $countUser }}</h3>
                            <div class="">
                                <!--<span class="badge badge-light text-danger"> -29% </span>--> <span class="ml-2">Número de Usuarios do sistema</span>
                            </div>
                        </div>
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-buffer display-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat position-relative width-card">
                <div class="card-body">
                    <div class="mini-stat-desc">
                        <h6 class="text-uppercase verti-label text-white-50">Us. Delet.</h6>
                        <div class="text-white">
                            <h6 class="text-uppercase mt-0 text-white-50">Usuarios Deletados</h6>
                            <h3 class="mb-3 mt-0">{{ $countUserDeleted }}</h3>
                            <div class="">
                                <!--<span class="badge badge-light text-primary"> 0% </span>--> <span class="ml-2">Número de Usuarios Deletados</span>
                            </div>
                        </div>
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-tag-text-outline display-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Primeiros Usuários</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Sobrenome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" colspan="2">Função</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersLimit5 as $users)
                                    @if($users->isActive === 1)
                                        <tr>
                                            <td>
                                                <div>
                                                    {{ $users->name }}
                                                </div>
                                            </td>
                                            <td>{{ $users->lastName }}</td>
                                            <td>{{ $users->email }}</td>
                                            
                                            @if($users->isAdmin === 1)
                                                <td><span class="badge badge-dark">Admin</span></td>
                                            @else
                                                <td><span class="badge badge-info">Aluno</span></td>
                                            @endif

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-6">
            <div class="card">
            <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Primeiros Leads</h4>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Sobrenome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" colspan="2">Celular</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leadsLimit5 as $leads)
                                    @if($leads->isActive === 1)
                                        <tr>
                                            <td>
                                                <div>
                                                    {{ $leads->name }}
                                                </div>
                                            </td>
                                            <td>{{ $leads->lastName }}</td>
                                            <td>{{ $leads->email }}</td>
                                            <td>{{ $leads->cell }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
