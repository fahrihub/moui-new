<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Searchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\ReportShowResource;


class Report extends Model
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

    public static function updateRecord($model, $request)
    {
        DB::beginTransaction(); //transaksi pada database -> tabel 1 -> table 2 -> tabel 3

        try {

            $model->name = $request->name;
            $model->location = $request->location;
            $model->created = $request->created;
            $model->section_id = $request->user()->section_id;
            $model->subsection_id = $request->user()->subsection_id;
            $model->report = $request->report;
            $model->save();
            DB::commit();
            return new ReportShowResource($model);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
