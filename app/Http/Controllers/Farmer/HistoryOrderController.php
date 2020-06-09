<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use Yajra\DataTables\Contracts\DataTables;
// use DataTables;
use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Contracts\DataTable;
use App\OrderItem;
use App\User;

class HistoryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // zamówienia starsze niż 4 dni temu
        $authuser = Auth::user();
        $orders = DB::table('order_items')
        ->join('articles','order_items.article_id','articles.id')
        ->join('orders','order_items.order_id','orders.id')
        ->select('orders.id','orders.created_at',DB::raw('SUM(order_items.quantity * order_items.price) as value'))
        ->whereDate('orders.created_at','<',Carbon::now()->subDays(4)->format('Y-m-d'))
        ->where('articles.farmer_id',$authuser->farmer->id)
        ->groupBy('orders.id')
        ->orderByDesc('orders.created_at')
        ->get();
        // dd($orders);
        if ($request->ajax()) {
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = 'Edit';
                    $btn = $btn . ' Delete';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //dd($books);
        return view('farmer.history.index', compact('orders'));
    }
    
    
}
