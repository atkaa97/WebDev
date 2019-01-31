<?php
    include('transport/transport.php');
    include('trait/trait.php');

    include('passanger.php');
    include('moto.php');
    include('bus.php');
    include('truck.php');

    $someCar = new Passanger();
    $someCar->type = 'Passanger Car';
    $someMoto = new Moto();
    $someBus = new Bus();
    $someTruck = new Truck();

?>

    <!DOCTYPE html>
<html>
    <head>
        <title>Transport</title>
        <style>
            table {
                border-collapse: collapse;
                width: 90%;
                margin: 40px auto;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){
                    background-color: #f2f2f2
            }

            th {
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>

    <body>

        <table>
            <tr>
                <th>Type</th>
                <th>Model</th>
                <th>Year</th>
                <th>Max Speed</th>
                <th>Horse Power</th>
                <th>Doors Count</th>
                <th>Seats Count</th>
                <th>Max Weight</th>
            </tr> 
            <tr> 
                <td><?= $someCar->type = 'Passanger Car'; ?></td>
                <td><?= $someCar->model = 'BMW'; ?></td>
                <td><?= $someCar->year = '2012'; ?></td>
                <td><?= $someCar->maxSpeed = '275 km/h'; ?></td>
                <td>-</td>
                <td><?= $someCar->doors = '4'; ?></td>
                <td><?= $someCar->seats = '4'; ?></td>
                <td>-</td>
            </tr>
            <tr>
                <td><?= $someMoto->type = 'Motorcycle'; ?></td>
                <td><?= $someMoto->model = 'Ducati'; ?></td>
                <td><?= $someMoto->year = '2015'; ?></td>
                <td><?= $someMoto->maxSpeed = '320 km/h'; ?></td>
                <td><?= $someMoto->horsePower = '82 HP'; ?></td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <!--    type-all || model-all || year-all || maxSpeed-all 
   horsePower-Moto || doors-Passenger  || seats-Passenger,Truck,Bus || maxWeight-Truck ||  -->
            <tr>
                <td><?= $someCar->type = 'Bus'; ?></td>
                <td><?= $someCar->model = 'Honda'; ?></td>
                <td><?= $someCar->year = '2008'; ?></td>
                <td><?= $someCar->maxSpeed = '200 km/h'; ?></td>
                <td>-</td>
                <td>-</td>
                <td><?= $someCar->seats = '26'; ?></td>
                <td>-</td>
            </tr>
            <tr>
                <td><?= $someCar->type = 'Truck'; ?></td>
                <td><?= $someCar->model = 'Kamaz :D'; ?></td>
                <td><?= $someCar->year = '1980'; ?></td>
                <td><?= $someCar->maxSpeed = '20 km/h'; ?></td>
                <td>-</td>
                <td>-</td>
                <td><?= $someCar->seats = '3'; ?></td>
                <td><?= $someCar->maxWeight = '5000 kg'; ?></td>
            </tr>
        </table>

    </body>
</html>