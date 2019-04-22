<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function  myFunction() {
            var c = {
                'ind' : ['input1', 'input2'],
                'bd' : ['input3', 'input4']
            };

            var mycity=document.getElementById("country");
            alert(c[1]);
            var myArray = 	{
                customer :
                    [
                        {
                            firstname : "tom",
                            lastname : "smith",
                            age : 23
                        },
                        {
                            firstname : "dick",
                            lastname : "head",
                            age : 42
                        },
                        {
                            firstname : "tom",
                            lastname : "thumb",
                            age : 18
                        }
                    ],
                location :
                    {
                        england :
                            {
                                main : "Warwick",
                                second : "Cannock",
                                third : "London"
                            },
                        france :
                            {
                                main : "Alsace",
                                second : "Corsica",
                                third : "Provence"
                            }
                    }
            };

            alert("First customer '" + myArray['customer'][0]['firstname'] + " " + myArray['customer'][0]['lastname'] + "' is " + myArray['age'][0]['age'] + " years old."); //first customer
            alert("First customer '" + myArray['customer'][1]['firstname'] + " " + myArray['customer'][1]['lastname'] + "' is " + myArray['age'][1]['age'] + " years old."); //second customer
            alert("First customer '" + myArray['customer'][2]['firstname'] + " " + myArray['customer'][2]['lastname'] + "' is " + myArray['age'][2]['age'] + " years old."); //third customer

//locations
            alert(myArray['location']['england']['main']); //Warwick
            alert(myArray['location']['england']['third']); //London
            alert(myArray['location']['france']['third']); //Provence
            
        }
    </script>
</head>
<body>
    <select id="country" onchange="myFunction();">
        <option>ind</option>
        <option>bd</option>
    </select >
    <br><br>
    <input type="text" id="city" size="20">

</body>
</html>