<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function changeConnection($connection = '')
    {
        ## function for change schema
        ## use : $this->changeConnection(getenv(DB_GPRO));
        if ($connection)
        {
            DB::setDefaultConnection($connection);
        }
        else
        {
            DB::setDefaultConnection(getenv('DB_DEFAULT'));
        }
    }

    public function createTempTable($fields = [])
    {
        $table = "temp" . md5(mt_rand());
        foreach ($fields as $key => $value)
        {
        }
        return $table;
    }

    public function insert($table, $data)
    {
        DB::beginTransaction();
        try
        {
            $id = DB::table($table)->insert($data);
            DB::commit();
            return $id;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function updateWhere($table, $data, $where)
    {
        DB::beginTransaction();
        try
        {
            DB::table($table)->where($where)->update($data);
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            dd($e->getMessage());
            return print_r($e->getMessage());
        }
    }

    public function delete($table, $where)
    {
        DB::beginTransaction();
        try
        {
            DB::table($table)->where($where)->delete();
            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            dd($e->getMessage());
            return print_r($e->getMessage());
        }
    }
}
