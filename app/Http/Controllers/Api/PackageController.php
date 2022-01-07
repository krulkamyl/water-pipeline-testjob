<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lib\MultiDatabaseConnector;
use App\Models\Report;
use App\Repository\Eloquent\PackageRepository;
use App\Repository\Eloquent\ReportRepository;
use App\Rules\PackageContent;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    private PackageRepository $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'package_content' => [
                'required',
                new PackageContent()
            ]
        ]);

        return $this->packageRepository->createModel($validate);
    }

    /**
     * Parse specific model
     *
     * @param  int  $id
     * @return Report
     */
    public function show($id)
    {
        $package = $this->packageRepository->get($id);
        return $package->parseData();
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
