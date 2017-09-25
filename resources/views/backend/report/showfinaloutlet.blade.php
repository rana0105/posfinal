<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Outlet Final Reprot</title>
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
        <h1 style="text-align: center;">Outlet Final Reprot</h1>
        <h4 style="text-align: center;">From Date : {{ $from }}</h4>
        <h4 style="text-align: center;">To Date :{{ $to }}</h4>

  <table style="margin-top: 15px; margin-bottom: 15px; float: center;">
    <thead>
      <tr>
        <th>Total Income</th>
        <th>Total Cost.</th>
        <th>Profit/Loss</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $totalsale }}</td>
        <td>{{ $totalexpense }}</td>
        <td>{{ $profit }}</td> 
      </tr>
      </tbody>
  </table> 
</body>
</html>