<h3>Missing Needles Report</h3>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>EPF</th>
            <th>Section</th>
            <th>Broken Time</th>
            <th>Release Time</th>
            <th>Request Letter</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $i => $record)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $record->date }}</td>
            <td>{{ $record->employee_epf }}</td>
            <td>{{ $record->section }}</td>
            <td>{{ $record->broke_time }}</td>
            <td>{{ $record->release_time }}</td>
            <td>{{ $record->request_letter ? 'Yes' : 'No' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
