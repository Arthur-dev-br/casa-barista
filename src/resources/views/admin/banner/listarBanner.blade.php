<main class="app-main" id="main" tabindex="-1">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Banners</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banners</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->

            <!-- SUCESSO ALERTA -->
             @if (session('sucesso'))
               <div class="alert alert-success" role="alert">
               <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                {{ session('sucesso'); }}
                 A simple success alert—check it out!
               </div>
             @endif
             
             @if (session('erro'))
               <!-- ERRO ALERTA -->
               <div class="alert alert-danger" role="alert">
               <i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i>
                {{ session('erro'); }}
                A simple danger alert—check it out!
               </div>
             @endif






            
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!--begin::Card-->
                <div class="card mb-4">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <div class="row g-2 align-items-center">
                      <div class="col-12 col-md-4">
                        <h3 class="card-title">Diretório do usuário</h3>
                      </div>
                      <div class="col-12 col-md-8">
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                          <div class="input-group input-group-sm w-auto">
                            <span class="input-group-text">
                              <i class="bi bi-search" aria-hidden="true"></i>
                            </span>
                            <input type="search" id="user-search" class="form-control" placeholder="Search users" aria-label="Search users" style="width: 180px">
                          </div>
                          <select id="user-role-filter" class="form-select form-select-sm w-auto" aria-label="Filter by role">
                            <option value="all" selected="">Todos</option>
                            <option value="Ativos">Ativos</option>
                            <option value="Inativos">Inativos</option>
                            
                          </select>
                          <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-user">
                            <i class="bi bi-sun-fill" aria-hidden="true"> </i>
                            Novo banner
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle m-0" role="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Status</th>
                            <th class="col" scope="col">Data</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($listaBanner as $banner)
                          <tr>
                            
                            <td>
                              {{$banner->id_banner}}
                            </td>

                            <td>@if($banner->imagem_banner)
                              <img src= "{{ asset('barista/assets/' . $banner->imagem_banner) }}"
                                    alt="{{$banner->titulo_banner }}"
                                    class = "rounded"
                                    style="
                                        width:140px;
                                        height:90px;
                                        object-fit:cover;
                                    "
                              >
                                @else
                                    <span class="text-muted">
                                        Sem imagem
                                    </span>

                             @endif</td>
                            <td>

                             @if($banner->titulo_banner)
                              <span>
                                {{$banner->titulo_banner}}
                              </span>
                             
                                @else
                                    <span class="text-muted">
                                        Sem imagem
                                    </span>

                             @endif




                            </td>
                            <td>
                              @if ($banner->status_banner)
                              <span class="badge text-bg-success">{{$banner->status_banner}}</span>

                                @else
                                <span class="badge text-bg-success">INATIVO</span>




                              @endif

                              
                            </td>
                            <td>
                              <span>
                                {{$banner->data_criacao_banner }} / {{$banner->data_atualizacao_banner}}
                              </span>

                            </td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Alexander Pierce">
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-user" aria-label="Delete Alexander Pierce">
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            
                            <td>Nenhum registro encontrado!</td>
                           
                            
                          </tr>
                         
                        @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->
                  <div class="card-footer clearfix">
                    <div class="float-start pt-1 fs-7 text-body-secondary">
                      <span>
                        Pagina 1 de 9 de {{$banner->Count()}} registros
                      </span>
                    </div>
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous"> « </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">4</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">5</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next"> » </a>
                      </li>
                    </ul>
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->

            <!--begin::Add User Modal-->
            <div
              class="modal fade"
              id="modal-add-user"
              tabindex="-1"
              aria-labelledby="modal-add-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">

                <!-- FORMA DE CADASTRO -->
                  <form
                    action="{{ route('admin.banner.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-banner-label">Colocar um banner novo</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>

                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="new-banner-name" class="form-label"> Nome do banner </label>
                        <input
                          type="text"
                          class="form-control"
                          id="new-banner-name"
                          placeholder="promoção de verão"
                          required
                          name="titulo_banner"
                        />
                      </div>

                      <div class="mb-3">
                      
                    
                        <label for="img-banner" class="form-label"> Selecione uma Imagem</label>
                        <input type="file" class="form-control input-banner" id="img-banner" name="imagem_banner" accept="image/*" required>
                        
                      <label for="img-banner" class="banner-upload">
                       
                        <img id="ver-banner" src="{{ asset('admin/assets/img/sem-banner.svg')}}" alt="Selecione uma imagem para o banner">

                        
                      </label>
                      </div>
                      
                      <div class="mb-3">
                        <label for="new-banner-role" class="form-label"> Status </label>
                        <select id="new-banner-role" class="form-select" name="status_banner">
                          <option value="ATIVO">ATIVO</option>
                          <option value="INATIVO">INATIVO</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                      </button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end::Add User Modal-->

            <!--begin::Delete User Modal-->
            <div
              class="modal fade"
              id="modal-delete-banner"
              tabindex="-1"
              aria-labelledby="modal-delete-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-user-label">Deletar Banner</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p class="mb-0">
                     Você tem certeza de que quer deletar este Banner? All content owned by the account
                      will be reassigned to the site administrator. This action cannot be undone.
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      Cancel
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                      Delete Banner
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Delete User Modal-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

      
<script>
    const inputBanner = document.getElementById('img-banner');
    const previewBanner = document.getElementById('ver-banner');
 
    inputBanner.addEventListener('change', function() {
 
        const arquivo = this.files[0];
 
        if (arquivo) {
 
            previewBanner.src = URL.createObjectURL(arquivo);
 
        }
 
    });
</script>