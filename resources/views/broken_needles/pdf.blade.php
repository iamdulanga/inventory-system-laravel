<h3>Broken Needles Report</h3>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>EPF</th>
            <th>Job Number</th>
            <th>Section</th>
            <th>Needle Type</th>
            <th>Needle Size</th>
            <th>Machine</th>
            <th>Parts Traced</th>
            <th>New Type</th>
            <th>New Size</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $i => $record)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $record->date }}</td>
            <td>{{ $record->employee_epf }}</td>
            <td>{{ $record->job_number }}</td>
            <td>{{ $record->section }}</td>
            <td>{{ $record->needle_type }}</td>
            <td>{{ $record->needle_size }}</td>
            <td>{{ $record->machine_number }}</td>
            <td>{{ $record->all_parts_traced ? 'YES' : 'NO' }}</td>
            <td>{{ $record->new_needle_type ?? '-' }}</td>
            <td>{{ $record->new_needle_size ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>