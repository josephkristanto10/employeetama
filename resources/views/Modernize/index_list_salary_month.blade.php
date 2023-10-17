<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('Modernize/images/logos/favicon.png') }}"/>
  <link rel="stylesheet" href="{{ asset('Modernize/css/styles.min.css') }}"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
     
          </ul>
       
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
                    <h5 class="card-title fw-semibold">Add Salary </h5>
           
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
                      <div class = "col-md-4">Week <br><input class = "form-control" name = "input_week"> </div>
                      <div class = "col-md-4">Month <br><input class = "form-control" name = "input_month"></div>
                      <div class = "col-md-4">Year <br><input class = "form-control" name = "input_year"></div>
                  </div>
                  <div class ="row mt-2">    <div class = "col-md-12">Period <br><input class = "form-control" name = "input_period"></div></div>
                  <div class ="row mt-2">
                    <div class = "col-md-4">Begining Balance <br> <input class = "form-control inputwiththousandseparaor" name = "input_begining_balance" > </div>
                    <div class = "col-md-4">Incoming Cash <br><input class = "form-control inputwiththousandseparaor" name = "input_incoming_Cash"></div>
                    <div class = "col-md-4">Incoming Cash Date <br><input class = "form-control" name = "input_incoming_date"></div>
                </div>
                <div class ="row mt-2">    <div class = "col-md-12">Details <br><input class = "form-control" name = "input_detail"></div></div>

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
                    {{-- <th>No</th> --}}
                    <th>Week</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Period</th>
                    <th>Total Salary</th>
                    <th>Begining Balance</th>
                    <th>Incoming Cash</th>
                    <th>Incoming Cash date</th>
                    <th>Cash Total</th>
                    <th>Remaining Balance</th>
                    <th>Detail</th>
                    <th>Action</th>
                  </tr>
                </thead>
                </table>
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
<script>
  $(".inputwiththousandseparaor").keyup(function (event) { 
        if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
            return; 
        }       
        var $this = $(this);            
        // Get the value.
        var input = $this.val();            
      
        input = input.replace(/[\D\s\._\-]+/g, ""); 
        input = input?parseInt(input, 10):0; 
        $this.val(function () {
            return (input === 0)?"":input.toLocaleString("en-US"); 
        }); 
  });
   
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
    var tls = $('#table_list_salary').DataTable({
      processing: true,
      serverSide: true,
      scrollX: true,
      ajax: '{{route('daftar_salary')}}',
      columns: [
        // {
        //    render: function (data, type, row, meta) {
        //      return meta.row + meta.settings._iDisplayStart + 1;
        //    },
        // },
        {
           data: 'week'
        },
        {
           data: 'month'
        },
        {
           data: 'year'
        },
        {
           data: 'period'
        },
        {
           data: 'jumlahtotal'
        },
        {
           data: 'beginning_balance'
        },
        {
           data: 'incoming_cash'
        },
        {
           data: 'tanggal_kas_masuk'
        },
        {
           data: 'cash_total'
        },
        {
           data: 'remaining_balance'
        },
        {
           data: 'detail'
        },
        {
           "render": function ( data, type, row ) {
             return '<button class="btn btn-primary btn-sm" onclick="lihatdetail('+row.id+')">Lihat</button>'
           }
        }
      ],
    });

  });
  function lihatdetail(myid){
    location.replace("{{url('/indexdetailsalary')}}/"+myid);
  }
  
  function tolistemployee(){
    location.replace("{{url('/listemployee')}}");
  }

  function addmonth(e){
    e.preventDefault();
    $.ajax({
    type: "post",
    url: "{{ route('add_month') }}",
    data: $('#addperiode').serialize(),
    dataType: "json",
    success: function (response) {
           Swal.fire(
              'Periode Created',
              "Periode Created Successfuly",
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
