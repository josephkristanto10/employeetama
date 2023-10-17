<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterEmployee;
use App\Models\MasterMonth;
use App\Models\DetailMonth;
use App\Models\MasterBonusPanen;
use App\Models\MasterBonusPanenLive;

use App\Models\DetailBonusPanen;
use App\Models\DetailBonusPanenPekerjaan;
use App\Models\MasterBonusPanenPekerjaan;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session("login")){
            return view("Modernize.index");
        }
        else{
            return redirect('/Login');
        }
    }
    public function index_add_employee(){
        if(session("login")){
            return view("Modernize.index_add_employee");
        }
        else{
            return redirect('/Login');
        }
       
    }
    public function add_employee(Request $request){

        $stringbirthdate = explode(",",$request->input_bod);
        $stringcity = $stringbirthdate[0];
        $stringdate = explode("-", $stringbirthdate[1]);
        $stringfixdate = $stringdate[2]."-".$stringdate[1]."-".$stringdate[0];
        $stringjodate = explode("-", $request->input_jod);
        $stringjofixdate = $stringjodate[2]."-".$stringjodate[1]."-".$stringjodate[0];
        MasterEmployee::create([
            'name' => $request->input_name, 
            'city' => $stringcity,
            'join_date' => $stringjofixdate, 
            'birth_date' => $stringfixdate, 
            'address' => $request->input_addr, 
            'phone' => $request->input_telp, 
            'devisi' => $request->input_devisi, 
            'status' => "on", 
        ]);
        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
        
    }
    public function listemployee(){
        if(session("login")){
            return view("Modernize.index_list_employee");
        }
        else{
            return redirect('/Login');
        }
       
    }
    public function daftar_employee(){
        $data = MasterEmployee::select('*',  DB::raw("DATE_FORMAT(birth_date, '%d %b %Y') as tanggallahir") ,  DB::raw("DATE_FORMAT(join_date, '%d %b %Y') as tanggaljoin"))->orderBy('tanggaljoin','DESC')->get();
        
        return DataTables::of($data)
                ->addColumn('City & Birthdate', function ($data) {
                    return $data->city . ', ' . $data->tanggallahir;
                })
                ->addColumn('Work Duration', function ($data) {
                    // $joindate = $data->join_date; 
                    $date = Carbon::parse($data->join_date);
                    $now = Carbon::now();
                    $diff = $date->diff($now);
                    return $diff->y." Year <br>".$diff->m." Month";
                })->escapeColumns([])->make(true);
    }
    public function listsalary(){
        if(session("login")){
            return view("Modernize.index_list_salary_month");
        }
        else{
            return redirect('/Login');
        }
       
    }
    public function daftar_salary(){
        // $data = MasterMonth::select('*',   DB::raw("DATE_FORMAT(incoming_cash_date, '%d %b %Y') as tanggal_kas_masuk"),   DB::raw("sum(detail_month.total) as jumlah_salary"))->join("detail_month",'detail_month.id_master_month','=','master_month.id')->groupBy('master_month.id')->get();
        
        $data  =
        DB::select(
            DB::raw("select master_month.*, SUM(detail_month.total) as jumlahtotal, DATE_FORMAT( master_month.incoming_cash_date, '%d %b %Y') as tanggal_kas_masuk, ((master_month.beginning_balance+incoming_cash) - SUM(detail_month.total)) from master_month left join detail_month on `detail_month`.`id_master_month` = `master_month`.`id` group by `master_month`.`id`")
        );
        return DataTables::of($data)->make(true);
    }
    public function delimiter_replace($number, $delimiter){
      
        return $fix_number;
    }
    public function add_month(Request $request){
        $inputbeginingbalance = str_replace(",","",$request->input_begining_balance);
        $inputincomingcash =  str_replace(",","",$request->input_incoming_Cash);
        $totalkas = (int)$inputbeginingbalance + (int)$inputincomingcash;
        MasterMonth::create([
            'week' => $request->input_week,
            'month' => $request->input_month, 
            'year' => $request->input_year,  
            'period' => $request->input_period,
            'beginning_balance' => (int)$inputbeginingbalance,
            'incoming_cash' => (int)$inputincomingcash,
            'incoming_cash_date' => $request->input_incoming_date,
            'cash_total' => $totalkas,
            'remaining_balance' => ($inputbeginingbalance ),
            'detail' => $request->input_detail,
            'total_salary' => 0,
        ]);
       



        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    public function add_detail_salaries(Request $request){
        $total_home_pay = 0;

        $idemployee = $request->input_id_employee;
        
        $honor_per_day = $request->input_honor_per_day;
        $work_duration = $request->input_work_duration;
        $honor_perweek = $honor_per_day * $work_duration;
        
        $honor_picket_day = $request->input_honor_picket_day;
        $total_picket_day = $request->input_total_picket_day;
        $total_honor_picket = $honor_picket_day * $total_picket_day;

        $extra = $request->input_extra;

        $total_home_pay = $honor_perweek + $total_honor_picket + $extra;
        $tunjangan = $request->input_tunjangan;
        $total_fix = $total_home_pay + $tunjangan;

        $id_month_salary = $request->id_master_month;

        DetailMonth::create([
            'id_master_month' => $id_month_salary,
            'id_employee' => $idemployee, 
            'salary_per_day' => $honor_per_day,
            'work_duration' => $work_duration,
            'total_honor_per_week' => $honor_perweek,
            'honor_day' => $honor_picket_day,
            'total_piket_day' => $total_picket_day,
            'total_honor_picket' => $total_honor_picket,
            'extra' => $extra,
            'total_honor_received' => $total_home_pay,
            'tunjangan' => $tunjangan,
            'total' => $total_fix, 
        ]);
        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    public function indexdetailsalary(Request $request){
        if(session("login")){
            $id = $request->id;
            $list_employee=DB::select('SELECT * FROM master_employee where master_employee.id not in (select detail_month.id_employee from detail_month where detail_month.id_master_month = '.$id.')');
            $list_all_employee = MasterEmployee::all();
            return view("Modernize.detail_list_salary_month", compact("id",'list_employee','list_all_employee'));
        }
        else{
            return redirect('/Login');
        }
    }
    public function detailsalary(Request $request){
        $id_month_salary = $request->id_month;
        $data = DetailMonth::select('*')
                            ->join('master_employee','master_employee.id','=','detail_month.id_employee')
                            ->where("detail_month.id_master_month", $id_month_salary)->get();
        return DataTables::of($data)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexbonuspanen(Request $request){
        if(session("login")){
            $list_all_employee = MasterEmployee::all();
            return view("Modernize.index_list_bonus_panen", compact('list_all_employee'));
        }
        else{
            return redirect('/Login');
        }
    }
    public function indexbonuspanenpekerjaan(Request $request){
        if(session("login")){
            $list_all_employee = MasterEmployee::all();
            return view("Modernize.index_list_bonus_panen_pekerjaan", compact('list_all_employee'));
        }
        else{
            return redirect('/Login');
        }
    }
    public function indexbonuspanenlive(Request $request){
        if(session("login")){
            $list_all_employee = MasterEmployee::all();
            return view("Modernize.index_list_bonus_panen_hidup", compact('list_all_employee'));
        }
        else{
            return redirect('/Login');
        }
    }
    public function list_panen_bonus(Request $request){
        $id_month_salary = $request->id_month;
        // $data = MasterBonusPanen::select('*')->where("id_master_month", $id_month_salary)->get();
        // $data = MasterBonusPanen::select(DB::raw('master_bonus_panen.*, SUM("detail_bonus_panen.bonus") as jumlahtotal'))
        //         ->leftJoin('detail_bonus_panen','detail_bonus_panen.id_master_bonus_panen','=','master_bonus_panen.id')
        //         ->groupBy('master_bonus_panen.id')->get();
        $data  =
        DB::select(
            DB::raw('
            select master_bonus_panen.*, SUM(detail_bonus_panen.bonus) as jumlahtotal from `master_bonus_panen` left join `detail_bonus_panen` on `detail_bonus_panen`.`id_master_bonus_panen` = `master_bonus_panen`.`id` group by `master_bonus_panen`.`id`;
            ')
        );
        return DataTables::of($data)->make(true);
  
    }
    public function listdetailbonuspanenperkerjaan(Request $request){
        
        $id_panen = $request->id_month_panen;
        $detailbonuspanen = DetailBonusPanenPekerjaan::join('master_employee', "master_employee.id",'=',"detail_bonus_panen_pekerjaan.id_employee")->select("*")->where("id_master_bonus_panen_pekerjaan", $id_panen)->get();
        return DataTables::of($detailbonuspanen)->make(true);
    }
    public function list_bonus_panen_pekerjaan(Request $request){
 
        $data  =
        DB::select(
            DB::raw('
            select master_bonus_panen_pekerjaan.*,count(detail_bonus_panen_pekerjaan.id) as jumlahpekerja_detail, SUM(detail_bonus_panen_pekerjaan.take_home_pay) as jumlahtotal from `master_bonus_panen_pekerjaan` left join `detail_bonus_panen_pekerjaan` on `detail_bonus_panen_pekerjaan`.`id_master_bonus_panen_pekerjaan` = `master_bonus_panen_pekerjaan`.`id` group by `master_bonus_panen_pekerjaan`.`id`;
            ')
        );
        return DataTables::of($data)->make(true);
  
    }
    public function add_mastermonth_bonus_panen_pekerjaan(Request $request){
        $master_panen_pekerjaan = MasterBonusPanenPekerjaan::create([
            'week' => $request->input_week,
            'month' => $request->input_month,
            'year' => $request->input_year,
            'periode' => $request->input_periode,
            'keterangan' => $request->input_keterangan,
            'jumlah_pekerja' => 0,
            'total_bonus' => 0,
            'detail' => $request->input_detail,
        ]);

        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    public function list_detail_bonus_panen(Request $request){
        $id_panen = $request->id_month_panen;
        $detailbonuspanen = DetailBonusPanen::join('master_employee', "master_employee.id",'=',"detail_bonus_panen.id_employee")->select("*")->where("id_master_bonus_panen", $id_panen)->get();
        return DataTables::of($detailbonuspanen)->make(true);
    }
    public function list_detail_bonus_panen_hidup(Request $request){
        $id_panen = $request->id_month_panen;
        $detailbonuspanen = DetailBonusPanenLive::join('master_employee', "master_employee.id",'=',"detail_bonus_panen_live.id_employee")->select("*")->where("id_master_bonus_panen", $id_panen)->get();
        return DataTables::of($detailbonuspanen)->make(true);
    }
    public function  list_panen_bonus_hidup(Request $request){
        $id_month_salary = $request->id_month;
        // $data = MasterBonusPanen::select('*')->where("id_master_month", $id_month_salary)->get();
        // $data = MasterBonusPanen::select(DB::raw('master_bonus_panen.*, SUM("detail_bonus_panen.bonus") as jumlahtotal'))
        //         ->leftJoin('detail_bonus_panen','detail_bonus_panen.id_master_bonus_panen','=','master_bonus_panen.id')
        //         ->groupBy('master_bonus_panen.id')->get();
        $data  =
        DB::select(
            DB::raw('
            select master_bonus_panen_live.*, SUM(detail_bonus_panen_live.bonus) as jumlahtotal from `master_bonus_panen_live` left join `detail_bonus_panen_live` on `detail_bonus_panen_live`.`id_master_bonus_panen` = `master_bonus_panen_live`.`id` group by `master_bonus_panen_live`.`id`;
            ')
        );
        return DataTables::of($data)->make(true);
    }
    // public function  list_panen_bonus_pekerjaan(Request $request){
    //     $id_month_salary = $request->id_month;
    //     // $data = MasterBonusPanen::select('*')->where("id_master_month", $id_month_salary)->get();
    //     // $data = MasterBonusPanen::select(DB::raw('master_bonus_panen.*, SUM("detail_bonus_panen.bonus") as jumlahtotal'))
    //     //         ->leftJoin('detail_bonus_panen','detail_bonus_panen.id_master_bonus_panen','=','master_bonus_panen.id')
    //     //         ->groupBy('master_bonus_panen.id')->get();
    //     $data  =
    //     DB::select(
    //         DB::raw('
    //         select master_bonus_panen_pekerjaan.*, SUM(detail_bonus_panen_pekerjaan.take_home_pay) as jumlahtotal from `master_bonus_panen_pekerjaan` left join `detail_bonus_panen_pekerjaan` on `detail_bonus_panen_pekerjaan`.`id_master_bonus_panen_pekerjaan` = `master_bonus_panen_pekerjaan`.`id` group by `master_bonus_panen_live`.`id`;
    //         ')
    //     );
    //     return DataTables::of($data)->make(true);
    // }
    public function add_master_bonus_panen_pekerjaan(Request $request){
        
    
        $id_detail_month = $request->id_master_month;
        $jumlahhari = $request->input_jumlah_hari;
        $bonusperhari = $request->input_bonus_per_day;
        $takehomepay = $jumlahhari * $bonusperhari;
        $detailpanen = DetailBonusPanenPekerjaan::create([
            'id_master_bonus_panen_pekerjaan' => $id_detail_month,
            'id_employee' => $request->input_employee, 
            'jumlah_hari' => $jumlahhari,
            'bonus_per_day' => $bonusperhari,
            'take_home_pay' => $takehomepay,
        ]);
        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    public function add_master_bonus_panen_hidup(Request $request){
        
        $stringdate = explode("-", $request->input_tanggal_panen);
        $stringfixdate = $stringdate[2]."-".$stringdate[1]."-".$stringdate[0];
        $master_panen_live = MasterBonusPanenLive::create([
            'id_master_month' => 0,
            'panen_date' => $stringfixdate,
            'buyer' => $request->input_buyer,
            'panen_location' => $request->input_lokasi_panen,
            'panen_petak' => $request->input_petak_panen,
            'weight' => $request->input_berat, 
            'total_weight' => $request->input_total_berat,
            'total_bonus' => 0,
            'detail' => $request->input_detail,
        ]);

        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    public function add_master_bonus_panen_fresh(Request $request){
        
        $stringdate = explode("-", $request->input_tanggal_panen);
        $stringfixdate = $stringdate[2]."-".$stringdate[1]."-".$stringdate[0];
        $master_panen_live = MasterBonusPanen::create([
            'id_master_month' => 0,
            'panen_date' => $stringfixdate,
            'buyer' => $request->input_buyer,
            'panen_location' => $request->input_lokasi_panen,
            'panen_petak' => $request->input_petak_panen,
            'weight' => $request->input_berat, 
            'total_weight' => $request->input_total_berat,
            'total_bonus' => 0,
            'detail' => $request->input_detail,
        ]);

        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
   
    public function add_bonus_panen(Request $request){
        $id_detail_month = $request->id_master_month;
        $detailpanen = DetailBonusPanen::create([
            'id_master_bonus_panen' => $id_detail_month,
            'id_employee' => $request->input_employee, 
            'bonus' => $request->input_bonus,
        ]);
        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    public function add_bonus_panen_live(Request $request){
        $id_detail_month = $request->id_master_month;
        $detailpanen = DetailBonusPanenLive::create([
            'id_master_bonus_panen' => $id_detail_month,
            'id_employee' => $request->input_employee, 
            'bonus' => $request->input_bonus,
        ]);
        return response()->json([
            'message' => "Success",
            'status' =>200
        ]);
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}