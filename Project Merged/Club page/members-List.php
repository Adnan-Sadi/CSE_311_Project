<!DOCTYPE html>

<style>
    table {
        text-align: center;
        border-right: 5px solid #343A40;
    }
    
    td:nth-child(2) {
        color: red;
        background: white;
    }
    
    td:nth-child(3) {
        font-size: 25px;
        background: #f85b5b;
    }
    
    tbody>tr:last-child>td {
        border-bottom: 5px solid black;
    }
</style>
<h1>

    Our members</h1>
<table class="table table-dark">
    <thead>
        <tr>
            <th style="width: 30px;">
                <h2>#</h2>
            </th>
            <th>
                <h2>Name</h2>
            </th>
            <th>
                <h2>Rank</h2>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Shanto</td>
            <td>***</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>**</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>*</td>
        </tr>
    </tbody>
    <hr>
</table>