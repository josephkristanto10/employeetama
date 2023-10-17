<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('Modernize/images/logos/favicon.png') }}"/>
  <link rel="stylesheet" href="{{ asset('Modernize/css/styles.min.css') }}"/>
  <!-- Latest compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> --}}

<!-- Optional theme -->
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"> --}}

<!-- Latest compiled and minified JavaScript -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style >
    .modal-backdrop
    {
        opacity:0.5 !important;
    }
    </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('Modernize/images/logos/dark-logo.svg') }}" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item" onclick = "todashboard()">
              <a class="sidebar-link" onclick = "todashboard()" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Employee</span>
            </li>
            <li class="sidebar-item" onclick="toaddemployee()">
              <a class="sidebar-link" onclick="toaddemployee()" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Add Employee</span>
              </a>
            </li>
            <li class="sidebar-item" onclick = "tolistemployee()">
              <a class="sidebar-link" onclick = "tolistemployee()" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">List Employee</span>
              </a>
            </li>
            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Typography</span>
              </a>
            </li> --}}
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Salary</span>
            </li>
            <li class="sidebar-item" onclick = "tolistsalary()">
              <a class="sidebar-link"  onclick = "tolistsalary()" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">List Salary (Permonth)</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Bonus</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{url('/indexbonuspanen')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Bonus Panen Fresh</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{url('/indexbonuspanen_live')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Bonus Panen Hidup</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{url('/indexbonuspanen_pekerjaan')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Bonus Pekerjaan</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Setting</span>
            </li>
            <li class="sidebar-item" onclick = "logout()">
              <a class="sidebar-link"  onclick = "logout()" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>
            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li> --}}
          </ul>
          {{-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div> --}}
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              {{-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> --}}
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Detail Salary </h5>
           
                  </div>
                  <span class = "mb-3" style = "float:right;" onclick = "showhide()" style = "cursor:pointer !important;"> Hide / Show</span>
                  {{-- <div>
                    <select class="form-select">
                      <option value="1">March 2023</option>
                      <option value="2">April 2023</option>
                      <option value="3">May 2023</option>
                      <option value="4">June 2023</option>
                    </select>
                  </div> --}}
                </div>
                <div>
                  <form id = "addperiode">
                    @csrf
                    <div class ="row mt-2">
                      <div class = "col-md-6">Employee <br> <select class = "form-control" name = "input_id_employee">
                          @foreach($list_employee as $le)
                          <option value = "{{$le->id}}">{{$le->name}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class = "col-md-6">
                        Honor (day) <br><input class = "form-control" name = "input_honor_per_day">
                      </div>
                    </div>
                  <div class ="row mt-2">  
                      <div class = "col-md-6">Work Duration <br><input class = "form-control" name = "input_work_duration"></div>   
                      <div class = "col-md-6">Honor Picket Day <br><input class = "form-control" name = "input_honor_picket_day"></div>
                  </div>
                  <div class ="row mt-2">  
                  <div class ="col-md-4">Total Picket Day <br><input class = "form-control" name = "input_total_picket_day" ></div>
                  <div class ="col-md-4">Extra <br><input class = "form-control" name = "input_extra" ></div>
                  <div class ="col-md-4">Tunjangan <br><input class = "form-control" name = "input_tunjangan" ></div>
                  </div>
                  <div class ="row mt-3" ><input  class="btn btn-primary" style = "width:100%;" value = "Submit" onclick = "addmonth(event)"></div>
                  </form>
                </div>
                <br><br>
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title fw-semibold">List Salary</h5>
                </div>
                {{-- <div id="chart"></div> --}}
                
                {{-- <div class ="row mt-2"><b>Add Employee</b> </div> --}}
                <table class="table table-bordered table-hover w-100" id = "table_list_salary">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Devisi</th>
                    <th>Honor / day</th>
                    <th>Work Duration</th>
                    <th>Honor / week</th>
                    <th>Honor Piket / day</th>
                    <th>Total Piket day</th>
                    <th>Total Honor Piket</th>
                    <th>Extra</th>
                    <th>Take Home Pay</th>
                    <th>Tunjangan</th>
                    <th>Total</th>
                  </tr>
                </thead>
                </table>

              </div>
            </div>
          </div>
  
        </div>
   {{-- Detail Bonus Panen --}}
   <div class="modal" id = "modal_bonus_panen" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Bonus Panen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
          <div class ="row" style = "width:100%;">
              <div class = "col-md-6">
                Tanggal Panen : <br><span id = "gantiisiantanggalpanen" style = "font-weight:bold;"></span>
              </div>
                <div class = "col-md-6">
                Buyer : <br><span id = "gantiisianbuyer" style = "font-weight:bold;"></span>
              </div>
            
          </div>
          <div class ="row mt-3" style = "width:100%;">
            <div class = "col-md-6">
              Petak Panen : <br><span id = "gantiisianpetakpanen" style = "font-weight:bold;"></span>
            </div>
            <div class = "col-md-6">
              Lokasi Panen : <br><span id = "gantiisianlokasipanen" style = "font-weight:bold;"></span>
            </div>
          </div>
          <hr>
          <form id = "add_bonus_panen">
            @csrf
          <div class ="row mt-2" style = "width:100%;">
            <div class = "col-md-6">
              <label>Choose Employee</label> 
          
              <select class = "form-control" name = "input_employee">
                @foreach($list_all_employee as $lae)
                  <option value = "{{ $lae->id }}">{{ $lae->name }} - {{ $lae->devisi }} </option>
                @endforeach
              </select>
            </div>
            <div class = "col-md-6">
              <label>Bonus</label> 
              <input class = "form-control" name = "input_bonus">
            </div>
          
          </div>
      
          <div class ="row mt-3" style = "width:100%;">
            <div class = "col-md-12">
            <button class = "btn btn-primary w-100" onclick = "addbonuspanen(event)">Add Bonus</button>
            </div>
          </div>
          <hr>
          <div class ="row mt-3" style = "width:100%;">
            <table class="table table-bordered table-hover w-100" id = "table_bonus_detail_panen">
              <thead>
              <tr>
                <th>Name</th>
                <th>Division</th>
                <th>Bonus</th>
                <th>Action</th>
              </tr>
            </thead>
            </table>
          </div>
          </form>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        </div>
      </div>
    </div>
  </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>


  <script src="{{ asset('Modernize/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('Modernize/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Modernize/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('Modernize/js/app.min.js') }}"></script>
  <script src="{{ asset('Modernize/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('Modernize/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('Modernize/js/dashboard.js') }}"></script>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script type = "text/javascript">

  var id_master_salary = {{$id}};
   
    function todashboard(){
    location.replace("{{url('/Employee')}}");
  }
    function logout(){
    $.ajax({
    type: "post",
    url: "{{ route('logout') }}",
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    success: function (response) {
      location.replace("{{url('/Login')}}");
    }
  });
  }
  function toaddemployee(){
    location.replace("{{url('/indexemployee')}}");
  }
  function tolistsalary(){
    location.replace("{{url('/listsalary')}}");
  }
  
  $(document).ready(function () {
    $('#table_list_salary').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '{{route('detailsalary')}}',
        data : {
          "id_month" : {{ $id }}
        }
      },
      columns: [
        {
           render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
           },
        },
        {
           data: 'name'
        },
        {
           data: 'devisi'
        },
        {
           data: 'salary_per_day'
        },
        {
           data: 'work_duration'
        },
        {
           data: 'total_honor_per_week'
        },
        {
           data: 'honor_day'
        },
        {
           data: 'total_piket_day'
        },
        {
           data: 'total_honor_picket'
        },
        {
           data: 'extra'
        },
        {
           data: 'total_honor_received'
        },
        {
           data: 'tunjangan'
        }
        ,
        {
           data: 'total'
        }
      ],
    });
    // $('#table_bonus_panen').DataTable({
    //   processing: true,
    //   serverSide: true,
    //   ajax: {
    //     url: '{{route('listbonuspanen')}}',
    //     data : {
    //       "id_month" : {{ $id }}
    //     }
    //   },
    //   columns: [
    //     {
    //        data: 'panen_date',
    //        render: function(data,type,row) {
    //                 data = '<span id = "list_bonus_panen_tanggal_panen_'+row.id+'">'+data+'</span>';
    //                 return data;}
    //     },
    //     {
    //        data: 'buyer',
    //        render: function(data,type,row) {
    //                 data = '<span id = "list_bonus_panen_buyer_'+row.id+'">'+data+'</span>';
    //                 return data;}
    //     },
    //     {
    //        data: 'panen_location',
    //        render: function(data,type,row) {
    //                 data = '<span id = "list_bonus_panen_lokasi_panen_'+row.id+'">'+data+'</span>';
    //                 return data;}
    //     },
    //     {
    //        data: 'panen_petak',
    //        render: function(data,type,row) {
    //                 data = '<span id = "list_bonus_panen_petak_panen_'+row.id+'">'+data+'</span>';
    //                 return data;}
           
    //     },
    //     {
    //        data: 'weight'
    //     },
    //     {
    //        data: 'total_weight'
    //     },
    //     {
    //        data: 'jumlahtotal'
    //     },
    //     {
    //       data: 'detail'
    //     },
    //     {
    //        "render": function ( data, type, row ) {
    //          return '<button class="btn btn-primary btn-sm" onclick="lihatdetail('+row.id+')" data-toggle = "modal" data-target="#modal_bonus_panen" >Lihat</button>'
    //        }
    //     }
    //   ],
    // });
  });

 
 

  function addbonuspanen(e){
   
    e.preventDefault();
    $.ajax({
    type: "post",
    url: "{{ route('addbonuspanen') }}",
    data: $('#add_bonus_panen').serialize(),
    dataType: "json",
    success: function (response) {
           Swal.fire(
              'Register Success',
              "Employee Registered Successfuly",
              'success'
            );
            $('#table_list_salary').DataTable().ajax.reload();
            $('#add_bonus_panen')[0].reset();
    }
  });
  }
  
  
  function lihatdetail(myid){
    var id_bonus_panen = myid;
    var tanggalpanen = $("#list_bonus_panen_tanggal_panen_"+myid).text(); 
    var buyer = $("#list_bonus_panen_buyer_"+myid).text(); 
    var lokasipanen = $("#list_bonus_panen_lokasi_panen_"+myid).text(); 
    var petakpanen = $("#list_bonus_panen_petak_panen_"+myid).text(); 

    $("#gantiisiantanggalpanen").text(tanggalpanen);
    $("#gantiisianbuyer").text(buyer);
    $("#gantiisianlokasipanen").text(lokasipanen);
    $("#gantiisianpetakpanen").text(petakpanen);

    




    $('#table_bonus_detail_panen').DataTable().destroy();
    $('#table_bonus_detail_panen').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '{{route('listdetailbonuspanen')}}',
        data : {
          "id_month_panen" : id_bonus_panen 
        }
      },
      columns: [
        {
           data: 'name'
           
        },
        {
           data: 'devisi'
        },
        {
           data: 'bonus'
        },
        {
           "render": function ( data, type, row ) {
             return '-'
           }
        }
      ],
    });
  }
  
  function tolistemployee(){
    location.replace("{{url('/listemployee')}}");
  }

  function addmonth(e){
    var formData = $('#addperiode').serializeArray();
    formData.push({ name: "id_master_month", value:  id_master_salary});

    e.preventDefault();
    $.ajax({
    type: "post",
    url: "{{ route('add_detail_salaries') }}",
    data: formData,
    dataType: "json",
    success: function (response) {
           Swal.fire(
              'Success',
              "Details Created Successfuly",
              'success'
            );
            $('#addperiode')[0].reset();
            $('#table_list_salary').DataTable().ajax.reload();
    }
  });
  }
  $('#addperiode').hide();
  function showhide(){
    $('#addperiode').toggle();
  }
</script>
