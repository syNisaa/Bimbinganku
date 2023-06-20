<title>Jadwal Dosen</title>

@include('template.css')

<body class="g-sidenav-show  bg-gray-100">
  
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    @include('template.sidebar')
</aside>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('template.navbar')
    
    
    <!-- End Navbar -->


    <div class="container py-4">
      <h6 class="font-weight-bolder mb-0">Jadwal Bimbingan</h6> <br>
    <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Nama Dosen</th>
                                <th scope="col" class="text-center">NIDN</th>
                                <th scope="col" class="text-center">Mahasiswa</th>
                                <th scope="col" class="text-center">Nim</th>
                                <th scope="col" class="text-center">Tanggal Mulai</th>
                                <th scope="col" class="text-center">Tanggal Selesai</th>
                                <th scope="col" class="text-center">Telegram Dosen</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $j)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                {{-- <td>
                                                <img class="card-img-top" src="{{ asset ('photo/'. $u->photo) }}" alt="Card image cap" width="30">
                                </td> --}}
                                <td class="text-center">{{ $j->dosen }}</td>
                                <td class="text-center">{{ $j->nidn }}</td>
                                <td class="text-center">{{ $j->mahasiswa }}</td>
                                <td class="text-center">{{ $j->nim }}</td>
                                <td class="text-center">{{ $j->tglmulai }}</td>
                                <td class="text-center">{{ $j->tglselesai }}</td>
                                <td class="text-center">{{ $j->telegram }}</td>
                                <td class="text-center"><a data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $j->id }}" class="btn btn-small text-success">
                                <i class="fa fa-edit"></i><span class="ml-2">Edit Dosen Pembimbing</span>
                            </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
                    Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                    target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

      <!-- Modal Update -->
      @foreach($jadwal as $j)
            <div class="modal" tabindex="-1" id="modalUpdate{{ $j->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Nama Dosen - {{$j->mahasiswa}} </h5>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="dosen/update/{{ $j->id }}" enctype="multipart/form-data">

                                @csrf
                                @method('put')

                                <div class="form-group">
                                    <label>Nama Dosen</label>
                                    <input type="text" name="dosen" id="dosen" class="form-control" value="{{$j->dosen}}" aria-label="day" aria-describedby="basic-addon1">
                                    @if($errors->has('basic'))
                                    <div class="text-danger">
                                        {{ $errors->first('namadosen')}}
                                    </div>
                                    @endif
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @endforeach

    </div>
  </main>
  