@extends('admin.template')

@section('title')
    {{ $title }}
@endsection

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="row flex-lg-nowrap">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ auth()->user()->name }}</h4>
                    <br>
                  </div>
                  @if(auth()->user()->isAdmin == 1)
                    <div class="text-center text-sm-right">
                        <span class="badge badge-secondary">administrator</span>
                    </div>
                  @else
                    <div class="text-center text-sm-right">
                        <span class="badge badge-info">aluno</span>
                    </div>
                  @endif
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Configurações</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">

                  <form class="form">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">

                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nome</label>
                              <input class="form-control" type="text" name="name" placeholder="Nome" value="{{ auth()->user()->name }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" placeholder="user@example.com" value="{{ auth()->user()->email }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Alterar Senha</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Senha Atual</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Nova Senha</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirme a <span class="d-none d-xl-inline">Senha</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Salvar Alterações</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
@endsection