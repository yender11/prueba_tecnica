<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }



    public function exportCsv(Request $request){
   
   $fileName = 'output.csv';
   $products = Product::orderBy('model', 'asc')->groupBy('model')->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('sku','name','configurations_variatons');

        $callback = function() use($products, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns,';');

            foreach ($products as $product) {
               $models = Product::where('model', $product->model)->get();
               $cadena = "";
               foreach ($models as $model) {
                    if($cadena == ""){
                         $cadena = $cadena."sku=".$model->sku.",color=".$model->attribute_color;
                    }
                    else
                   {
                        $cadena = $cadena."|sku=".$model->sku.",color=".$model->attribute_color;
                   }
               }
                
                $row['sku']  =$product->model;
                $row['name']  = $product->name;
                $row['configurations_variatons']  = $cadena;
                    
//0xAgt4BnwJDnIMxf2s3ZwzKuOijCNR9Qrs4antkJ
                //$row['model']    = $product->model;
               // $row['price']    = $product->price;
                //$row['color']  = $product->color;

                fputcsv($file, array($row['sku'],$row['name'],$row['configurations_variatons']), ';');
                $cadena = "";
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    

}
