<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sale Reprot</title>
  <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        width: auto;
        font-size: 12px;
        border: 1px solid #000000;
        /*border: none;*/
        text-align: center;
        padding-top: 4px;
        padding-bottom:  5px;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    input {
        border: none;
    }

    textarea {
        border: none;
  }
  </style>
</head>
<body>
        <h1 style="text-align: center;">Sale Reprot</h1>

  <table style="margin-top: 15px; margin-bottom: 15px; float: center;">
    <thead>
      <tr>
        <th>Outlet Name</th>
        <th>Counter No.</th>
        <th>Sale Amount</th>
      </tr>
    </thead>
    <tbody>
    @foreach($sale as $s)
      <tr>
        <td>{{ $s->outlets->out_name }}</td>
        <td>{{ $s->counter_id }}</td>
        <td>{{ $s->spayment}}</td> 
      </tr>
    @endforeach
        
    </tbody>
  </table> 
</body>
</html>