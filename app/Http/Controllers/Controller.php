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

    public function callService($url = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err)
        {
            $result = json_decode(json_encode([
                'status' => 'error',
                'message' => $err
            ]), true);
        }
        else
        {
            $result = json_decode($response);
        }
        return $result;
    }
}
