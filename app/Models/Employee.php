<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Searchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\EmployeeResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Employee extends Model
{
    use Filterable,
        Searchable;

    /**
     * The default key for the order.
     *
     * @var string
     */
    protected $defaultOrder = 'name';

    /**
     * scout indexable data array for model
     * #[SearchUsingPrefix(['id', 'email'])]
     * #[SearchUsingFullText(['bio'])]
     * @return void
     */
    protected function toSearchableArray()
    {
        return [
            // 'id' => 'id',
            // 'name' => 'name',
        ];
    }

    /**
     * Undocumented function
     * #[FilterUsingAge(['age'])]
     *
     * @return array
     */
    protected function toFilterableArray(): array
    {
        return [
            // 'age' => 'born_date'
        ];
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public static function toFilterableParams(): array
    {
        return [
            // 'age' => [
            //     'title' => 'Filter Age',
            //     'data' => null,
            //     'used' => false,
            //     'operators' => ['=', '<=', '>='],
            //     'operator' => null,
            //     'value' => null,
            // ],
        ];
    }

    //agar tidak di kenal hacker
    protected function fullName(): Attribute
    {
        return Attribute::make(
            //concat in php
            
            
            // get: fn ($value, $attributes) => $attributes['degree_first'] . '. ' . $attributes['name'] . ', ' . $attributes['degree_last']
            get: fn ($value, $attributes) => ($attributes['degree_first'] ? $attributes['degree_first'] . '. ' : '') . $attributes['name'] . ($attributes['degree_last'] ? ', ' . $attributes['degree_last'] : '') 
            // get: function ($value, $attrs) {
            //     $f = $attrs['degree_first'] ? $attrs['degree_first'] . '. ' : '';
            //     $n = $attrs['name'];
            //     $l = $attrs['degree_last'] ? ', ' . $attrs['degree_last'] : '';
            //     return $f . $n . $l;
            // }
        );
    }

    //untuk joion database
    // protected function toFilterableScope($query){
    //     return $query->join
    // }
    
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 'L' ? 'Laki - Laki' : 'Perempuan' 
        );
    }

    /**
     * scope for model-combo
     *
     * @param Builder $query
     * @return void
     */
    public function scopeFetchCombo(Builder $query)
    {
        return $query
            ->select('name AS text', 'id AS value')
            ->get();
    }

    public static function storeRecord($request)
    {
        DB::beginTransaction(); //transaksi pada database -> tabel 1 -> table 2 -> tabel 3

        try {

            $model = new static;
            $model->name = $request->name;
            $model->degree_first = $request->degree_first;
            $model->degree_last = $request->degree_last;
            $model->gender = $request->gender;
            $model->education = $request->education;
            $model->save();

            DB::commit();
            return new EmployeeResource($model);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public static function updateRecord($request)
    {
        DB::beginTransaction(); //transaksi pada database -> tabel 1 -> table 2 -> tabel 3

        try {

            $model = new static;
            $model->name = $request->name;
            $model->degree_first = $request->degree_first;
            $model->degree_last = $request->degree_last;
            $model->gender = $request->gender;
            $model->education = $request->education;
            $model->save();

            DB::commit();
            return new EmployeeResource($model);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public static function destroyRecord($model)
    {
        DB::beginTransaction(); //transaksi pada database -> tabel 1 -> table 2 -> tabel 3

        try {

            $model->delete();
            DB::commit();
            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}