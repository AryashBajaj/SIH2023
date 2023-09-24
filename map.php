<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dropout Rates per State</title>
</head>
<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script>
    google.load('visualization', '1', {'packages': ['geochart']});
    google.setOnLoadCallback(FetchdrawDropoutMap);
    function FetchdrawDropoutMap() {
        console.log("Hello");
        var js;
        var xml = new XMLHttpRequest();
        xml.open("GET", "abcd.php", true);
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var js = JSON.parse(this.responseText);
                console.log(js);
                var data = 100*(js[0].DS/js[0].TS);
                drawDropoutMap(data);
            }
        }
        xml.send();
    }
    function drawDropoutMap(data) {
        console.log("Draw function");
        var dropoutData = google.visualization.arrayToDataTable([
            ['State Code', 'State', 'Dropout Rates per state'],
            ['IN-UP','Uttar Pradesh', 25],
            ['IN-MH','Maharashtra', 32],
            ['IN-BR','Bihar', 31],
            ['IN-WB','West Bengal', 32],
            ['IN-MP','Madhya Pradesh', data],
            ['IN-TN','Tamil Nadu', 33],
            ['IN-RJ','Rajasthan', 33],
            ['IN-KA','Karnataka', 29],
            ['IN-GJ','Gujarat', 34],
            ['IN-AP','Andhra Pradesh', 32],
            ['IN-OR','Orissa', 33],
            ['IN-TG','Telangana', 33],
            ['IN-KL','Kerala', 31],
            ['IN-JH','Jharkhand', 29],
            ['IN-AS','Assam', 28],
            ['IN-PB','Punjab', 30],
            ['IN-CT','Chhattisgarh', 33],
            ['IN-HR','Haryana', 30],
            ['IN-JK','Jammu and Kashmir', 20],
            ['IN-UT','Uttarakhand', 28],
            ['IN-HP','Himachal Pradesh', 17],
            ['IN-TR','Tripura', 31],
            ['IN-ML','Meghalaya', 21],
            ['IN-MN','Manipur', 22],
            ['IN-NL','Nagaland', 22],
            ['IN-GA','Goa', 32],
            ['IN-AR', 'Arunachal Pradesh', 33],
            ['IN-MZ','Mizoram', 23],
            ['IN-SK','Sikkim', 24],
            ['IN-DL','Delhi', 31],
            ['IN-PY','Puducherry', 33],
            ['IN-CH','Chandigarh', 30],
            ['IN-AN','Andaman and Nicobar Islands', 30],
            ['IN-DN','Dadra and Nagar Haveli', 30],
            ['IN-DD','Daman and Diu', 29],
            ['IN-LD','Lakshadweep', 31]

        ]);

        var chartOptions = {
            region: 'IN',
            domain: 'IN',
            displayMode: 'regions',
            colorAxis: {colors: ['#8bc34a', '#ffff00', '#ff5722']},
            resolution: 'provinces',
            defaultColor: '#f5f5f5',
            width: 640,
            height: 480
        };

        var dropoutChart = new google.visualization.GeoChart(
            document.getElementById('dropout-map'));
        dropoutChart.draw(dropoutData, chartOptions);
    };
</script>
<body>

<div align="center">
    <h1>Student Dropout Rates per State</h1>
    <div id="dropout-map"></div>
</div>
</body>
</html>