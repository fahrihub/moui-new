<?php

namespace App\Http\Resources;

use App\Models\Schedule;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ScheduleResource::collection($this->collection);
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function with($request)
    {
        if (!$request->has('initialized')) {
            return [];
        }

        return [
            'setups' => [
                /** the page combo */
                'combos' => [
                    'section' => [
                        ['value' => 'Sekretariat', 'text' => 'Sekretariat'],
                        ['value' => 'Pembinaan dan Data Kepegawaian', 'text' => 'Pembinaan dan Data Kepegawaian'],
                        ['value' => 'Perencanaan dan Mutasi Kepegawaian', 'text' => 'Perencanaan dan Mutasi Kepegawaian'],
                        ['value' => 'Pengembangan Sumber Daya Aparatur', 'text' => 'Pengembangan Sumber Daya Aparatur'],
                    ],
                    'subsection' => [
                        ['value' => 'Umum dan Kepegawaian', 'text' => 'Umum dan Kepegawaian'],
                        ['value' => 'Program dan Keuangan', 'text' => 'Program dan Keuangan'],
                        ['value' => 'Disiplin', 'text' => 'Disiplin'],
                        ['value' => 'Kinerja dan Kesejateraan Pegawai', 'text' => 'Kinerja dan Kesejateraan Pegawai'],
                        ['value' => 'Data dan Informasi Kepegawaian', 'text' => 'Data dan Informasi Kepegawaian'],
                    ]
                ],

                /** the page enable fitur */
                'features' => [
                    'create' => false,
                    'show' => false,
                    'export' => false,
                    'import' => false,
                    'print' => false,
                    'search' => false,
                    'trashed' => false,
                ],

                /** the page data filter */
                'filters' => Schedule::toFilterableParams($request),

                /** the table header */
                'headers' => [
                    ['text' => 'Bidang', 'value' => 'section'],
                    ['text' => 'Sub Bidang', 'value' => 'subsection'],
                    ['text' => 'Nama Kegiatan', 'value' => 'name'],
                    ['text' => 'Tempat', 'value' => 'location'],
                    ['text' => 'Tanggal Kegiatan', 'value' => 'created'],
                    ['text' => 'Laporan Kegiatan', 'value' => 'report'],
                    // ['text' => 'Updated', 'value' => 'updated_at', 'class' => 'field-datetime'],
                ],

                /** the record key */
                'key' => 'id',

                /** the page default */
                'record_base' => [
                    'id' => null,
                    'name' => null,
                ],

                /** the page title */
                'title' => 'Untitled',
            ]
        ];
    }
}
