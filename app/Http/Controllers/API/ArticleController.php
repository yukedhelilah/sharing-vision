<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\JsonFormatter;
use App\Models\Posts;
use Exception;
use Validator;

class ArticleController extends Controller
{
    public function list($limit, $offset)
    {
        try {
            $data   = Posts::list($limit, $offset);

            return JsonFormatter::success(
                $data,
                'success get data'
            );
        } catch (Exception $error) {
            return JsonFormatter::error(
                null,
                $error->getMessage(),
                500
            );
        }
    }

    public function detail($id)
    {
        try {
            $data = Posts::find($id);

            if(!$data) {
                return JsonFormatter::error(
                    null,
                    'data not found',
                    402
                );
            }

            return JsonFormatter::success(
                $data->first(),
                'success get data'
            );
        } catch (Exception $error) {
            return JsonFormatter::error(
                null,
                $error->getMessage(),
                500
            );
        }
    }

    public function add(Request $request)
    {
        try {
            $validateData = Validator::make($request->all(), [
                'title'    => 'required|min:20',
                'content'  => 'required|min:200',
                'category' => 'required|min:3',
                'status'   => 'required|in:Publish,Draft,Trash',
            ]);

            if($validateData->fails()) {
                return JsonFormatter::error(
                    null,
                    $validateData->errors(),
                    405
                );
            }

            $input = $request->all();
            $data = Posts::create($input);

            return JsonFormatter::success(
                $data,
                'success insert data'
            );
        } catch (Exception $error) {
            return JsonFormatter::error(
                null,
                $error->getMessage(),
                500
            );
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $validateData = Validator::make($request->all(), [
                'title'    => 'required|min:20',
                'content'  => 'required|min:200',
                'category' => 'required|min:3',
                'status'   => 'required|in:Publish,Draft,Trash',
            ]);

            if($validateData->fails()) {
                return JsonFormatter::error(
                    null,
                    $validateData->errors(),
                    405
                );
            }

            $input                 = $request->all();
            $input['updated_date'] = date("Y-m-d H:i:s");

            $data = Posts::find($id);
            if($data) {
                $data->update($input);

                return JsonFormatter::success(
                    true,
                    'success update data'
                );
            }

            return JsonFormatter::error(
                null,
                'data not found',
                402
            );
        } catch (Exception $error) {
            return JsonFormatter::error(
                null,
                $error->getMessage(),
                500
            );
        }
    }

    public function delete($id)
    {
        try {
            $data = Posts::find($id);
            if($data) {
                $data->update(['status' => 'Trash']);

                return JsonFormatter::success(
                    true,
                    'success delete data'
                );
            }

            return JsonFormatter::error(
                null,
                'data not found',
                402
            );
        } catch (Exception $error) {
            return JsonFormatter::error(
                null,
                $error->getMessage(),
                500
            );
        }
    }
}
