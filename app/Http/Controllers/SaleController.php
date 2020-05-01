<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Repositories\SaleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use PDF;

class SaleController extends AppBaseController
{
    /** @var  SaleRepository */
    private $saleRepository;

    public function __construct(SaleRepository $saleRepo)
    {
        $this->saleRepository = $saleRepo;
    }

    /**
     * Display a listing of the Sale.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sales = $this->saleRepository->all();

        return view('sales.index')
            ->with('sales', $sales);
    }
    public function cetak_pdf($id)
    {
        $sales = $this->saleRepository->find($id);
        
    	$pdf = PDF::loadview('sales.sale_pdf',['sale'=>$sales]);
    	return $pdf->download('Nota Penjualan.pdf');
    }
    /**
     * Show the form for creating a new Sale.
     *
     * @return Response
     */
    public function create()
    {
        $customers = \App\Models\Customer::pluck('name','id');
        $items = \App\Models\Item::pluck('name','id');
        return view('sales.create')->with(compact('items'))->with(compact('customers'));
    }

    /**
     * Store a newly created Sale in storage.
     *
     * @param CreateSaleRequest $request
     *
     * @return Response
     */
    public function store(CreateSaleRequest $request)
    {
        DB::beginTransaction();
        try{
        $input = $request->all();
        $input['user_id']=\Auth::user()->id;
        $sale = $this->saleRepository->create($input);
        foreach ($input['item_id'] as $key => $row){
            $sale_detail = new \App\Models\SaleDetail();
            $item = \App\Models\Item::find($input['item_id'][$key]);
            $sale_detail->item_id = $item->id;
            $sale_detail->qty = $input['qty'][$key];
            $sale_detail->sub_total = $input['sub_total'][$key];
            $sale_detail->sale_id = $sale->id;
            $sale_detail->save();

            $new_stok = (int)$item->stock - (int)$input['qty'][$key];
            $item->stock = $new_stok;
            $item->save();
        }
        $result = $sale->id;
        DB::commit();

        Flash::success('Penjualan berhasil disimpan.');
    }catch(Exception $e){
        DB::rollBack();
    }
    return redirect(route('sales.show',$result));
    }
    /**
     * Display the specified Sale.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sale = $this->saleRepository->find($id);

        if (empty($sale)) {
            Flash::error('Penjualan tidak ditemukan');

            return redirect(route('sales.index'));
        }

        return view('sales.show')->with('sale', $sale);
    }

    /**
     * Show the form for editing the specified Sale.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sale = $this->saleRepository->find($id);

        if (empty($sale)) {
            Flash::error('Penjualan tidak ditemukan');

            return redirect(route('sales.index'));
        }

        return view('sales.edit')->with('sale', $sale);
    }

    /**
     * Update the specified Sale in storage.
     *
     * @param int $id
     * @param UpdateSaleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSaleRequest $request)
    {
        $sale = $this->saleRepository->find($id);

        if (empty($sale)) {
            Flash::error('Penjualan tidak ditemukan');

            return redirect(route('sales.index'));
        }

        $sale = $this->saleRepository->update($request->all(), $id);

        Flash::success('Penjualan berhasil diperbarui.');

        return redirect(route('sales.index'));
    }

    /**
     * Remove the specified Sale from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::table('purchases')->where('id',$id)->delete();


        // $sale = $this->saleRepository->find($id);

        // if (empty($sale)) {
        //     Flash::error('Penjualan tidak ditemukan');

        //     return redirect(route('sales.index'));
        // }

        // $this->saleRepository->delete($id);

        Flash::success('Penjualan berhasil dihapus.');

        return redirect(route('sales.index'));
    }
}
