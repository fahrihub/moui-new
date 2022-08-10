<table>
    <thead>
    <tr>
        <th>Bidang</th>
        <th>Sub Bidang</th>
        <th>Nama Kegiatan</th>
        <th>Tempat Kegiatan</th>
        <th>Tanggal Kegiatan</th>
        <th>Laporan Kegiatan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($schedules as $schedule)
        <tr>
            <td>{{ $schedule->section->name }}</td>
            <td>{{ $schedule->subsection->name }}</td>
            <td>{{ $schedule->name }}</td>
            <td>{{ $schedule->location }}</td>
            <td>{{ $schedule->created }}</td>
            <td>{{ $schedule->report }}</td>
        </tr>
    @endforeach
    </tbody>
</table>